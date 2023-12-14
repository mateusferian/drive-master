<?php
include_once('../conexao/Conexao.php');
include_once('../model/PaymentInInstallments.php');

include_once('../dao/FirstPaymentInInstallmentsDAO.php');
include_once('../dao/SecondPaymentInInstallmentsDAO.php');
include_once('../dao/ThirdPaymentInInstallmentsDAO.php');
include_once('../dao/FifthPaymentInInstallmentsDAO.php');
include_once('../dao/FourthPaymentInInstallmentsDAO.php');
include_once('../dao/SixthPaymentInInstallmentsDAO.php');
include_once('../model/Client.php');
include_once('../dao/ClientDAO.php');

$client = new Client();
$clientdao = new ClientDAO();

$firstPaymentInInstallmentsDAO = new FirstPaymentInInstallmentsDAO();
$secondPaymentInInstallmentsDAO = new SecondPaymentInInstallmentsDAO();

$thirdPaymentInInstallmentsDAO = new ThirdPaymentInInstallmentsDAO();
$fourthPaymentInInstallmentsDAO = new FourthPaymentInInstallmentsDAO();

$fifthPaymentInInstallmentsDAO = new FifthPaymentInInstallmentsDAO();
$sixthPaymentInInstallmentsDAO = new SixthPaymentInInstallmentsDAO();

$firstPaymentInInstallmentsList = $firstPaymentInInstallmentsDAO->listOpenInstallment();
$secondPaymentInInstallmentsList = $secondPaymentInInstallmentsDAO->listOpenInstallment();

$thirdPaymentInInstallmentsList = $thirdPaymentInInstallmentsDAO->listOpenInstallment();
$fourthPaymentInInstallmentsList = $fourthPaymentInInstallmentsDAO->listOpenInstallment();

$fifthPaymentInInstallmentsList = $fifthPaymentInInstallmentsDAO->listOpenInstallment();
$sixthPaymentInInstallmentsList = $sixthPaymentInInstallmentsDAO->listOpenInstallment();

$processedClientIds = array();
$notifications = array();

function processInstallmentList($installmentList,  $processedClientIds, $clientdao, &$notifications)
{
    foreach ($installmentList as $installment) {
        $clientId = $installment->getIdClient();

        if (!in_array($clientId, $processedClientIds)) {
            $client = $clientdao->findById($clientId);
            $notificationMessage = "Informamos que o usuário " . $client->getName() . " está com o pagamento em aberto";
            $notifications[] = $notificationMessage;

            $processedClientIds[] = $clientId;
        }
    }
}

processInstallmentList($firstPaymentInInstallmentsList,  $processedClientIds, $clientdao, $notifications);
processInstallmentList($secondPaymentInInstallmentsList, $processedClientIds, $clientdao, $notifications);

processInstallmentList($thirdPaymentInInstallmentsList,  $processedClientIds, $clientdao, $notifications);
processInstallmentList($fourthPaymentInInstallmentsList, $processedClientIds, $clientdao, $notifications);

processInstallmentList($fifthPaymentInInstallmentsList,  $processedClientIds, $clientdao, $notifications);
processInstallmentList($sixthPaymentInInstallmentsList,  $processedClientIds, $clientdao, $notifications);


echo implode(';', $notifications);
?>

