<?php
    include_once "../conexao/Conexao.php";
    include_once "../model/Cnh.php";
    include_once "../dao/CnhDAO.php";

    $cnh = new Cnh();
    $cnhDAO = new CnhDAO();

    $d = filter_input_array(INPUT_POST);

    if(isset($_POST['save'])){

        $cnh->setCategory(($d['category']));
        $cnh->setType(($d['type_cnh']));
        $cnh->setMedicalExam(($d['medical_exam']));

        $cnh->setRegistrationNumber(($d['registration_number']));
        $cnh->setBiometricUpdate(($d['biometric_update']));
        $cnh->setIdClient(($d['idclient']));

        $cnhDAO->create($cnh);

       // header("Location: ../cadastro-de-taxa.php");
    }

    else if(isset($_POST['editar'])) {

        $cnh->setIdCnh(($d['idcnh']));
        $cnh->setCategory(($d['category']));
        $cnh->setType(($d['type_cnh']));
        $cnh->setMedicalExam(($d['medical_exam']));

        $cnh->setRegistrationNumber(($d['registration_number']));
        $cnh->setBiometricUpdate(($d['biometric_update']));
        $cnh->setIdClient(($d['idclient']));
    
        $cnhDAO->update($cnh);
    
        header("Location: ../#.php");
    }


    else if(isset($_GET['del'])){

        $cnh->setIdCnh($_GET['del']);

        $cnhDAO->delete($cnh);

        header("Location: ../#.php");

    } 

?>