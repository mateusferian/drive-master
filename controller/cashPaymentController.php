<?php
    include_once "../conexao/Conexao.php";
    include_once "../model/CashPayment.php";
    include_once "../dao/CashPaymentDAO.php";

    $cashPayment = new CashPayment();
    $cashPaymentDAO = new CashPaymentDAO();

    $d = filter_input_array(INPUT_POST);

    if(isset($_POST['save'])){

        $cashPayment->setValueCashPayment(($d['value_cash_payment']));
        $cashPayment->setDateCashPayment(($d['date_cash_payment']));
        $cashPayment->setIdClient(($d['idclient']));
        $cashPaymentDAO->create($cashPayment);

        header("Location: ../cadastro-de-taxa.php");
    }
?>