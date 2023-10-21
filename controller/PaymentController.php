<?php
    include_once "../conexao/Conexao.php";
    include_once "../model/Payment.php";
    include_once "../dao/PaymentDAO.php";

    $payment = new Payment();
    $paymentdao = new PaymentDAO();

    $d = filter_input_array(INPUT_POST);

    if(isset($_POST['save'])){

        $payment->setAmount(($d['amount']));
        $payment->setPaymentForm(($d['payment_form']));

        $payment->setTheoreticCourse(($d['theoretic_course']));
        $payment->setInstallmentDate(($d['installment_date']));

        $payment->setInstallmentValue(($d['installment_value']));
        $payment->setSituation(($d['situation']));
        $payment->setIdclient(($d['idclient']));

        $paymentDAO->create($payment);

        header("Location: ../#.php");
    }

    else if(isset($_POST['editar'])) {

        $payment->setIdPayment(($d['idpayment']));
        $payment->setAmount(($d['amount']));
        $payment->setPaymentForm(($d['payment_form']));

        $payment->setTheoreticCourse(($d['theoretic_course']));
        $payment->setInstallmentDate(($d['installment_date']));

        $payment->setInstallmentValue(($d['installment_value']));
        $payment->setSituation(($d['situation']));
        $payment->setIdclient(($d['idclient']));

        $paymentDAO->create($payment);

        header("Location: ../#.php");
    }


    else if(isset($_GET['del'])){

        $payment->setIdPayment($_GET['del']);

        $paymentDAO->delete($payment);

        header("Location: ../#.php");

    } 

?>