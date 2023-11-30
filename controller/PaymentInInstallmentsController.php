<?php
    include_once "../conexao/Conexao.php";
    include_once "../model/PaymentInInstallments.php";
    include_once "../dao/PaymentInInstallmentsDAO.php";

    $paymentInInstallments = new PaymentInInstallments();
    $paymentInInstallmentsDAO = new PaymentInInstallmentsDAO();

    $d = filter_input_array(INPUT_POST);

    if(isset($_POST['save'])){

        $paymentInInstallments->setInstallmentValue(($d['valueOfFirstInstallment']));
        $paymentInInstallments->setInstallmentDate(($d['dateOfFirstInstallment']));
        $paymentInInstallments->setInstallmentMode(($d['installmentMode']));
        $paymentInInstallments->setInstallmentStatus(($d['paymentStatus']));
        $paymentInInstallments->setIdClient(($d['idclient']));
        $paymentInInstallmentsDAO->create($paymentInInstallments);

        header("Location: ../formulario-de-consulta.php?fixa-do-aluno=" . $d['idclient']);
    }
?>