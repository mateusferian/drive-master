<?php
    include_once "../conexao/Conexao.php";

    include_once('../model/CashPayment.php');
    include_once('../dao/CashPaymentDAO.php');

    include_once('../model/CourseOnSight.php');
    include_once('../dao/CourseOnSightDAO.php');

    include_once('../model/PaymentInInstallments.php');
    include_once('../dao/FirstPaymentInInstallmentsDAO.php');

    $d = filter_input_array(INPUT_POST);

    $cashPayment = new CashPayment();
    $cashPaymentDAO = new CashPaymentDAO();

    $courseOnSight = new CourseOnSight();
    $courseOnSightDAO = new CourseOnSightDAO();

    $firstPaymentInInstallments = new PaymentInInstallments();
    $firstPaymentInInstallmentsDAO = new FirstPaymentInInstallmentsDAO();

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
        $courseOnSight = $courseOnSightDAO->findByClientId($idclient);
        $firstPaymentInInstallments = $firstPaymentInInstallmentsDAO->findByClientId($idclient);

        if($cashPayment){
        header("Location: ../alterar-pagamento-avista.php?al=$idclient");
        exit;
        }else if($courseOnSight){
            header("Location: ../alterar-curso-avista.php?al=$idclient");
            exit;
        }else if($firstPaymentInInstallments){
            header("Location: ../alterar-pagamento-parcelado.php?al=$idclient");
            exit;
        }
    }
?>