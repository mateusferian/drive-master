<?php
    include_once "../conexao/Conexao.php";
    include_once "../model/Cnh.php";
    include_once "../dao/CnhDAO.php";

    $cnh = new Cnh();
    $cnhDAO = new CnhDAO();

    $d = filter_input_array(INPUT_POST);

    if(isset($_POST['save'])){

        $cnh->setCategory(($d['category']));
        $cnh->setType(($d['type']));

        $cnh->setRegistration(($d['registration']));
        $cnh->setMedicalExam(($d['medicalExam']));

        $cnh->setRegistrationNumber(($d['registrationNumber']));
        $cnh->setBiometricUpdate(($d['biometricUpdate']));
        $cnh->setIdClient(($d['idClient']));

        $cnhDAO->create($cnh);

        header("Location: ../cadastro-de-taxa.php");
    }

    else if(isset($_POST['editar'])) {

        $cnh->setIdCnh(($d['idCnh']));
        $cnh->setCategory(($d['category']));
        $cnh->setType(($d['type']));

        $cnh->setRegistration(($d['registration']));
        $cnh->setMedicalExam(($d['medicalExam']));

        $cnh->setRegistrationNumber(($d['registrationNumber']));
        $cnh->setBiometricUpdate(($d['biometricUpdate']));
        $cnh->setIdClient(($d['idClient']));
    
        $cnhDAO->update($cnh);
    
        header("Location: ../#.php");
    }


    else if(isset($_GET['del'])){

        $cnh->setIdCnh($_GET['del']);

        $cnhDAO->delete($cnh);

        header("Location: ../#.php");

    } 

?>