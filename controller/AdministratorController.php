<?php
    include_once "../conexao/Conexao.php";
    include_once "../model/Administrator.php";
    include_once "../dao/AdministratorDAO.php";

    $administrator = new Administrator();
    $administratorDAO = new AdministratorDAO();

    $d = filter_input_array(INPUT_POST);

    if(isset($_POST['salvar'])){
        $registerDate =  date("Y-m-d");
        $hash = password_hash(($d['passwordAdministrator']), PASSWORD_DEFAULT);
        $administrator->setIdAdministrator((null));
        $administrator->setNameAdministrator(($d['name']));
        $administrator->setEmail(($d['email']));
        $administrator->setPasswordAdministrator(($hash));
        $administrator->setRegisterDate(($registerDate));
        
        $administratorDAO->create($administrator);

        header("Location: ../cadastro-administrador.php?sucess=1111");
    }

    else if(isset($_POST['editar'])) {

        $updateDate =  date("Y-m-d");
        $administrator->setIdAdministrator(($d['idAdministrator']));
        $administrator->setNameAdministrator(($d['name']));
        $administrator->setEmail(($d['email']));
        $administrator->setPasswordAdministrator(($d['passwordAdministrator']));
        $administrator->setRegisterDate(($updateDate));
    
        $administratorDAO->update($administrator);
    
        header("Location: ../buscar-administrator.php");
    }


    else if(isset($_GET['del'])){

        $administrator->setIdAdministrator($_GET['del']);

        $administratorDAO->delete($administrator);

        header("Location: ../buscar-administrator.php");

    } 

?>