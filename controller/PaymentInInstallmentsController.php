<?php
include_once "../conexao/Conexao.php";
include_once "../model/PaymentInInstallments.php";
include_once "../dao/FirstPaymentInInstallmentsDAO.php";
include_once "../dao/SecondPaymentInInstallmentsDAO.php";

$firstPaymentInInstallmentsDAO = new FirstPaymentInInstallmentsDAO();
$secondPaymentInInstallmentsDAO = new SecondPaymentInInstallmentsDAO();


if (isset($_POST['save'])) {
    $idClient = $_POST['idclient'];

    for ($i = 1; $i <= 2; $i++) {
        $paymentInInstallments = new PaymentInInstallments();
        $paymentInInstallments->setInstallmentValue($_POST['valueOfInstallment' . $i] ?? 0.00);
        $paymentInInstallments->setInstallmentDate($_POST['dateOfInstallment' . $i] ?? date('Y-m-d'));
        $paymentInInstallments->setInstallmentMode($_POST['installmentMode' . $i] ?? 'Parcelado no cartão');
        $paymentInInstallments->setInstallmentStatus($_POST['paymentStatus' . $i] ?? 'Em aberto');
        $paymentInInstallments->setIdClient($idClient);

        switch ($i) {
            case 1:
                $firstPaymentInInstallmentsDAO->create($paymentInInstallments);
                break;
            case 2:
                $secondPaymentInInstallmentsDAO->create($paymentInInstallments);
                break;
            // case 3:
            //     $thirdPaymentInInstallmentsDAO->create($paymentInInstallments);
            //     break;
            // case 4:
            //     $fourthPaymentInInstallmentsDAO->create($paymentInInstallments);
            //     break;
            // case 5:
            //     $fifthPaymentInInstallmentsDAO->create($paymentInInstallments);
            //     break;
            // case 6:
            //     $sixthPaymentInInstallmentsDAO->create($paymentInInstallments);
            //     break;
            default:
                // Handle unexpected value
                break;
        }
    }

    header("Location: ../formulario-de-consulta.php?fixa-do-aluno=" . $idClient);
}
