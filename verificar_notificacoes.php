<?php
include_once('./conexao/Conexao.php');

include_once('./model/PaymentInInstallments.php');
include_once('./dao/FirstPaymentInInstallmentsDAO.php');
include_once('./dao/SecondPaymentInInstallmentsDAO.php');
include_once "./dao/ThirdPaymentInInstallmentsDAO.php";
include_once "./dao/FourthPaymentInInstallmentsDAO.php";
include_once "./dao/FifthPaymentInInstallmentsDAO.php";
include_once "./dao/SixthPaymentInInstallmentsDAO.php";


include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');

$client = new Client();
$clientdao = new ClientDAO();
$paymentInInstallment = new PaymentInInstallments();

$fifthPaymentInInstallmentsDAO = new FifthPaymentInInstallmentsDAO();

$paymentInInstallmentsList = $fifthPaymentInInstallmentsDAO->read();

foreach ($paymentInInstallmentsList as $paymentInInstallment) : 
    $client = $clientdao->findById($paymentInInstallment->getIdClient());
    $data_formatada = date("d/m/Y", strtotime($paymentInInstallment->getInstallmentDate()));
    echo "Informamos que o usuário " . $client->getName() ." está com o pagamento em aberto da 5ª parcela da data " . $data_formatada .  "<br>";

endforeach;
