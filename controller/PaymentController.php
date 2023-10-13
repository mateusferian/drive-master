<?php
    include_once "../conexao/Conexao.php";
    include_once "../model/Payment.php";
    include_once "../dao/PaymentDAO.php";

    $payment = new Payment();
    $paymentdao = new PaymentDAO();

    $d = filter_input_array(INPUT_POST);

    if(isset($_POST['save'])){

        $payment->setAmount(($d['amount']));
        $payment->setPaymentForm(($d['paymentForm']));

        $payment->setTheoreticCourse(($d['theoreticCourse']));
        $payment->setInstallmentDate(($d['installmentDate']));

        $payment->setInstallmentValue(($d['installmentValue']));
        $payment->setSituation(($d['situation']));
        $payment->setIdclient(($d['idClient']));

        $paymentDAO->create($payment);

        header("Location: ../#.php");
    }

    else if(isset($_POST['editar'])) {

        $payment->setIdPayment(($d['idPayment']));
        $payment->setAmount(($d['amount']));
        $payment->setPaymentForm(($d['paymentForm']));

        $payment->setTheoreticCourse(($d['theoreticCourse']));
        $payment->setInstallmentDate(($d['installmentDate']));

        $payment->setInstallmentValue(($d['installmentValue']));
        $payment->setSituation(($d['situation']));
        $payment->setIdclient(($d['idClient']));
    
        $paymentDAO->update($payment);
    
        header("Location: ../#.php");
    }


    else if(isset($_GET['del'])){

        $payment->setIdPayment($_GET['del']);

        $paymentDAO->delete($payment);

        header("Location: ../#.php");

    } 

?>