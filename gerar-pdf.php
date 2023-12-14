<?php
include_once('./conexao/Conexao.php');

include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');

include_once('./model/CourseOnSight.php');
include_once('./dao/CourseOnSightDAO.php');

include_once('./model/CashPayment.php');
include_once('./dao/CashPaymentDAO.php');

include_once('./model/PaymentInInstallments.php');
include_once('./dao/FirstPaymentInInstallmentsDAO.php');

$client = new Client();
$clientDAO = new ClientDAO();

$courseOnSight = new CourseOnSight();
$courseOnSightDAO = new CourseOnSightDAO();

$cashPayment = new CashPayment();
$cashPaymentDAO = new CashPaymentDAO();

$firstPaymentInInstallments = new PaymentInInstallments();
$firstPaymentInInstallmentsDAO = new FirstPaymentInInstallmentsDAO();

if (isset($_GET["pdf"])) {
    $idClient = $_GET["pdf"];

    $client = $clientDAO->findById($idClient);

    $cashPayment = $cashPaymentDAO->findByClientId($idClient);
    $courseOnSight = $courseOnSightDAO->findByClientId($idClient);
    $firstPaymentInInstallments = $firstPaymentInInstallmentsDAO->findByClientId($idClient);

    if(isset($courseOnSight)) {
        include_once('gerar-pdf-do-curso-a-vista.php');
    }else if(isset($cashPayment)) {
        include_once('gerar-pdf-do-pagamento-avista.php');
    }else if(isset($firstPaymentInInstallments)) {
        include_once('gerar-pdf-parcelas.php');
    }

}
?>