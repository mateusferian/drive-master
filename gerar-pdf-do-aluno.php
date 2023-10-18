<?php
require './assets/pdf/autoload.php';
include_once('./conexao/Conexao.php');
include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');
include_once('./model/Cnh.php');
include_once('./dao/CnhDAO.php');
include_once('./model/Rates.php');
include_once('./dao/RatesDAO.php');

$client = new Client();
$clientDAO = new ClientDAO();

$cnh = new Cnh();
$cnhDAO = new CnhDAO();

$rates = new Rates();
$ratesDAO = new RatesDAO();

use Dompdf\Dompdf;

if (isset($_GET["pdf"])) {
    $idClient = $_GET["pdf"];

    $client = $clientDAO->findById($idClient);

    $cnh = $cnhDAO->findByClientId($idClient);
    $rates = $ratesDAO->findByClientId($idClient);


    if ($client) {
$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-br'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<link rel='stylesheet' href='http://localhost/celke/css/custom.css'";
$dados .= "<title>Autoescola Lider - Gerar PDF</title>";
$dados .= "</head>";
$dados .= "<body>";
$dados .= "<h1> Dados do aluno: " . strtoupper($client->getName()) . "</h1>";

    $dados .= "ID: jose <br>";
    $dados .= "Nome de Aluno: " . $client->getName() . "<br>";
    $dados .= "Email: " . $client->getEmail() . "<br>";
    $dados .= "Nome da Responsável (Feminino): " . $client->getMother() . "<br>";
    $dados .= "Nome do Responsável (Masculino): " . $client->getFather() . "<br>";
    $dados .= "RG: " . $client->getRg() . "<br>";
    $dados .= "RG-Expedição: " . $client->getRgExpedition() . "<br>";
    $dados .= "UF: " . $client->getUf() . "<br>";
    $dados .= "Data de nascimento: " . $client->getBirthDate() . "<br>";
    $dados .= "CPF: " . $client->getCpf() . "<br>";
    $dados .= "RENACH SP: " . $client->getRenach() . "<br>";
    $dados .= "Naturalidade: " . $client->getNaturalness() . "<br>";
    $dados .= "Endereço: " . $client->getAddress() . "<br>";
    $dados .= "Bairro: " . $client->getNeighborhood() . "<br>";
    $dados .= "Numero de residência: " . $client->getNumber() . "<br>";
    $dados .= "Celular: " . $client->getCelphone() . "<br>";
    $dados .= "Telefone: " . $client->getTelephone() . "<br>";
    $dados .= "Local de Atividade: " . $client->getActivityLocation() . "<br>";

    $dados .= "Curso: " . $cnh->getCategory() . "<br>";
    $dados .= "Categoria: " . $cnh->getType() . "<br>";
    $dados .= "Data do exame médico: " . $cnh->getMedicalExam() . "<br>";
    $dados .= "Numero de registro: " . $cnh->getRegistrationNumber() . "<br>";
    $dados .= "Atualização Biometrica: " . $cnh->getBiometricUpdate() . "<br>";
    
    $dados .= "Teórico: " . $rates->getTheoretic() . "<br>";
    $dados .= "Pratico de Carro: " . $rates->getPractice1() . "<br>";
    $dados .= "Pratico de Moto: " . $rates->getPractice2() . "<br>";
    $dados .= "Emissão CNH: " . $rates->getEmissionCnh() . "<br>";
    $dados .= "Reprova: " . $rates->getDisapprove() . "<br>";
    $dados .= "Data Exame A: " . $rates->getExamA() . "<br>";
    $dados .= "Data Exame B: " . $rates->getExamB() . "<br>";
    $dados .= "Data Exame D: " . $rates->getExamD() . "<br>";
    
    $dados .= "<hr>";   
$dados .= "</body>";
$dados .= "</html>";

$dompdf = new Dompdf(['enable_remote' => true]);

$dompdf->loadHtml($dados);

$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream();

} else {
    echo "Cliente não encontrado";
}
}
?>
