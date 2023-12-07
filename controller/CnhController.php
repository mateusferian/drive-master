<?php
    include_once "../conexao/Conexao.php";
    include_once "../model/Cnh.php";
    include_once "../dao/CnhDAO.php";

    $cnh = new Cnh();
    $cnhdao = new CnhDAO();

    $d = filter_input_array(INPUT_POST);

    if(isset($_POST['save'])){

        $cnh->setCategory(($d['category']));
        $cnh->setType(($d['type_cnh']));
        $cnh->setMedicalExam(($d['medical_exam']));
        $cnh->setRegistrationNumber(($d['registration_number']));
        $cnh->setBiometricUpdate(($d['biometric_update']));
        $cnh->setIdClient(($d['idclient']));

        $cnhdao->create($cnh);

        header("Location: ../cadastro-de-taxa.php");
    }

    else if(isset($_POST['edit'])) {

        $cnh->setIdCnh(($d['idcnh']));
        $cnh->setCategory(($d['category']));
        $cnh->setType(($d['type_cnh']));
        $cnh->setMedicalExam(($d['medical_exam']));
        $cnh->setRegistrationNumber(($d['registration_number']));
        $cnh->setBiometricUpdate(($d['biometric_update']));
        $cnh->setIdClient(($d['idclient']));

        $idclient = $cnh->getIdClient();

        $cnhdao->update($cnh);
    
        header("Location: ../alterar-taxa.php?al=$idclient");
    }


    else if(isset($_GET['del'])){

        $cnh->setIdCnh($_GET['del']);

        $cnhdao->delete($cnh);

        header("Location: ../#.php");

    } 

?>