<?php
    include_once "../conexao/Conexao.php";
    include_once "../model/CourseOnSight.php";
    include_once "../dao/CourseOnSightDAO.php";

    $courseOnSight = new CourseOnSight();
    $courseOnSightDAO = new CourseOnSightDAO();

    $d = filter_input_array(INPUT_POST);

    if(isset($_POST['save'])){

        $courseOnSight->setvalueOfFirstInstallment(($d['valueOfFirstInstallment']));
        $courseOnSight->setDateOfFirstInstallment(($d['dateOfFirstInstallment']));
        $courseOnSight->setInstallmentMode(($d['installmentMode']));
        $courseOnSight->setPaymentStatus(($d['paymentStatus']));
        $courseOnSightDAO->create($courseOnSight);

        $courseOnSight->setValueOfSecondInstallment(($d['valueOfSecondInstallment']));
        $courseOnSight->setDateOfSecondInstallment(($d['dateOfSecondInstallment']));
        $courseOnSight->setInstallmentModeSecondInstallment(($d['installmentMode']));
        $courseOnSight->setPaymentStatusSecondInstallment(($d['paymentStatusSecondInstallment']));
        $courseOnSightDAO->create($courseOnSight);

        $courseOnSight->setvalueOfThirdInstallment(($d['valueOfThirdInstallment']));
        $courseOnSight->setDateOfThirdInstallment(($d['dateOfThirdInstallment']));
        $courseOnSight->setInstallmentModeThirdInstallment(($d['installmentModeThirdInstallment']));
        $courseOnSight->setaymentStatusThirdInstallment(($d['paymentStatusThirdInstallment']));
        $courseOnSightDAO->create($courseOnSight);
     
        $courseOnSight->setValueOfFourthInstallment(($d['valueOfFourthInstallment']));
        $courseOnSight->setDateOfFourthInstallment(($d['dateOfFourthInstallment']));
        $courseOnSight->setInstallmentModeFourthInstallment(($d['installmentModeFourthInstallment']));
        $courseOnSight->setPaymentStatusFourthInstallment(($d['paymentStatusFourthInstallment']));
        $courseOnSightDAO->create($courseOnSight);

        $courseOnSight->setValueOfFifthInstallment(($d['valueOfFifthInstallment']));
        $courseOnSight->setDateOfFifthInstallment(($d['dateOfFifthInstallment']));
        $courseOnSight->setInstallmentModeFifthInstallment(($d['installmentModeFifthInstallment']));
        $courseOnSight->setPaymentStatusFifthInstallment(($d['paymentStatusFifthInstallment']));
        $courseOnSightDAO->create($courseOnSight);

        $courseOnSight->setValueOfSixthInstallment(($d['valueOfSixthInstallment']));
        $courseOnSight->setDateOfSixthInstallment(($d['dateOfSixthInstallment']));
        $courseOnSight->setInstallmentModeSixthInstallment(($d['installmentModeSixthInstallment']));
        $courseOnSight->setPaymentStatusSixthInstallment(($d['paymentStatusSixthInstallment']));
        $courseOnSightDAO->create($courseOnSight);
        header("Location: ../cadastro-de-taxa.php");
    }
?>