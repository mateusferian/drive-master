<?php
include_once "../conexao/Conexao.php";
include_once "../model/PaymentInInstallments.php";

include_once "../dao/FirstPaymentInInstallmentsDAO.php";
include_once "../dao/SecondPaymentInInstallmentsDAO.php";
include_once "../dao/ThirdPaymentInInstallmentsDAO.php";

include_once "../dao/FourthPaymentInInstallmentsDAO.php";
include_once "../dao/FifthPaymentInInstallmentsDAO.php";
include_once "../dao/SixthPaymentInInstallmentsDAO.php";

$firstPaymentInInstallmentsDAO = new FirstPaymentInInstallmentsDAO();
$secondPaymentInInstallmentsDAO = new SecondPaymentInInstallmentsDAO();
$thirdPaymentInInstallmentsDAO = new ThirdPaymentInInstallmentsDAO();

$fourthPaymentInInstallmentsDAO = new FourthPaymentInInstallmentsDAO();
$fifthPaymentInInstallmentsDAO = new FifthPaymentInInstallmentsDAO();
$sixthPaymentInInstallmentsDAO = new SixthPaymentInInstallmentsDAO();

if (isset($_POST['save'])) {
    $idClient = $_POST['idclient'];

    // Set default values if the first installment is filled
    $defaultInstallmentValue = $_POST['valueOfInstallment1'] ?? 0;
    $defaultInstallmentDate = $_POST['dateOfInstallment1'] ?? date('Y-m-d');
    $defaultInstallmentMode = $_POST['installmentMode1'] ?? 'Parcelado no cartão';
    $defaultPaymentStatus = $_POST['paymentStatus1'] ?? 'Em aberto';

    for ($i = 1; $i <= 6; $i++) {
        $paymentInInstallments = new PaymentInInstallments();
        $paymentInInstallments->setInstallmentValue($_POST['valueOfInstallment' . $i] ?? $defaultInstallmentValue);
        $paymentInInstallments->setInstallmentDate($_POST['dateOfInstallment' . $i] ?? $defaultInstallmentDate);
        $paymentInInstallments->setInstallmentMode($_POST['installmentMode' . $i] ?? $defaultInstallmentMode);
        $paymentInInstallments->setInstallmentStatus($_POST['paymentStatus' . $i] ?? $defaultPaymentStatus);
        $paymentInInstallments->setIdClient($idClient);

        switch ($i) {
            case 1:
                $firstPaymentInInstallmentsDAO->create($paymentInInstallments);
                break;
            case 2:
                $secondPaymentInInstallmentsDAO->create($paymentInInstallments);
                break;
            case 3:
                $thirdPaymentInInstallmentsDAO->create($paymentInInstallments);
                break;
            case 4:
                $fourthPaymentInInstallmentsDAO->create($paymentInInstallments);
                break;
            case 5:
                $fifthPaymentInInstallmentsDAO->create($paymentInInstallments);
                break;
            case 6:
                $sixthPaymentInInstallmentsDAO->create($paymentInInstallments);
                break;
            default:
                // Handle unexpected value
                break;
        }
    }

    header("Location: ../formulario-de-consulta.php?Ficha-do-aluno=" . $idClient);
}


if (isset($_POST['edit'])) {
    $idClient = $_POST['idclient'];

    for ($i = 1; $i <= 6; $i++) {

        $paymentInInstallments = new PaymentInInstallments();
        $idKey = 'IdPaymentInInstallments' . $i;

        if (isset($_POST[$idKey])) {
            $idFromForm = $_POST[$idKey];
            $paymentInInstallments->setIdPaymentInInstallments($idFromForm);
        }

        $paymentInInstallments->setInstallmentValue($_POST['valueOfInstallment' . $i] ?? 0.00);
        $paymentInInstallments->setInstallmentDate($_POST['dateOfInstallment' . $i] ?? date('Y-m-d'));
        $paymentInInstallments->setInstallmentMode($_POST['installmentMode' . $i] ?? 'Parcelado no cartão');
        $paymentInInstallments->setInstallmentStatus($_POST['paymentStatus' . $i] ?? 'Em aberto');
        $paymentInInstallments->setIdClient($idClient);

        switch ($i) {
            case 1:
                $firstPaymentInInstallmentsDAO->update($paymentInInstallments);
                break;
            case 2:
                $secondPaymentInInstallmentsDAO->update($paymentInInstallments);
                break;
            case 3:
                $thirdPaymentInInstallmentsDAO->update($paymentInInstallments);
                break;
            case 4:
                $fourthPaymentInInstallmentsDAO->update($paymentInInstallments);
                break;
            case 5:
                $fifthPaymentInInstallmentsDAO->update($paymentInInstallments);
                break;
            case 6:
                $sixthPaymentInInstallmentsDAO->update($paymentInInstallments);
                break;
            default:
                // Handle unexpected value
                break;
        }
    }

    header("Location: ../formulario-de-consulta.php?aluno-alterado=" . $idClient);
}
