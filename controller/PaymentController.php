<?php
    include_once "../conexao/Conexao.php";
    include_once('../model/CashPayment.php');
    include_once('../dao/CashPaymentDAO.php');

    $d = filter_input_array(INPUT_POST);

    $cashPayment = new CashPayment();
    $cashPaymentDAO = new CashPaymentDAO();

    if(isset($_POST['save'])){
        $selectedValue = isset($_POST['installmentType']) ? $_POST['installmentType'] : '';
    
        if($selectedValue == "cashPayment"){
            header("Location: ../cadastro-pagamento-avista.php");
        } else if($selectedValue == "installment"){
            header("Location: ../cadastro-pagamento-parcelado.php");
        } else if($selectedValue == "courseToView"){
            header("Location: ../cadastro-curso-avista.php");
        }
    }

    if(isset($_GET['al'])){

        $idclient = $_GET['al'];
        $cashPayment = $cashPaymentDAO->findByClientId($idclient);

        if($cashPayment){
        header("Location: ../alterar-pagamento-avista.php?al=$idclient");
        exit;
        }
    }
?>