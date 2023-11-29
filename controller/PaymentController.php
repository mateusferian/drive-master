<?php
    include_once "../conexao/Conexao.php";
    include_once "../model/Payment.php";
    include_once "../dao/PaymentDAO.php";

    $payment = new Payment();
    $paymentdao = new PaymentDAO();

    $d = filter_input_array(INPUT_POST);

    if(isset($_POST['save'])){
        $selectedValue = isset($_POST['installmentType']) ? $_POST['installmentType'] : '';
    
        if($selectedValue == "cashPayment"){
            header("Location: ../cadastro-pagamento-avista.php");
        } else if($selectedValue == "installment"){
            header("Location: ../cadastro-curso-avista.php");
        } else if($selectedValue == "courseToView"){
            header("Location: ../courseToView.php");
        }
    }
    
?>