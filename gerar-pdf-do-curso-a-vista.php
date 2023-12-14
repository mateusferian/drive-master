<?php
include_once('restrito.php');
require './assets/pdf/autoload.php';
include_once('./conexao/Conexao.php');
include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');
include_once('./model/Cnh.php');
include_once('./dao/CnhDAO.php');
include_once('./model/Rates.php');
include_once('./dao/RatesDAO.php');

include_once('./model/CourseOnSight.php');
include_once('./dao/CourseOnSightDAO.php');

include_once('./model/CashPayment.php');
include_once('./dao/CashPaymentDAO.php');

include_once('./model/PaymentInInstallments.php');

include_once('./dao/FirstPaymentInInstallmentsDAO.php');
include_once('./dao/SecondPaymentInInstallmentsDAO.php');
include_once('./dao/ThirdPaymentInInstallmentsDAO.php');
include_once('./dao/FifthPaymentInInstallmentsDAO.php');
include_once('./dao/FourthPaymentInInstallmentsDAO.php');
include_once('./dao/SixthPaymentInInstallmentsDAO.php');

$client = new Client();
$clientDAO = new ClientDAO();

$cnh = new Cnh();
$cnhDAO = new CnhDAO();

$rates = new Rates();
$ratesDAO = new RatesDAO();

$courseOnSight = new CourseOnSight();
$courseOnSightDAO = new CourseOnSightDAO();

$cashPayment = new CashPayment();
$cashPaymentDAO = new CashPaymentDAO();

$firstPaymentInInstallments = new PaymentInInstallments();
$firstPaymentInInstallmentsDAO = new FirstPaymentInInstallmentsDAO();

$secondPaymentInInstallments = new PaymentInInstallments();
$secondPaymentInInstallmentsDAO = new SecondPaymentInInstallmentsDAO();

$thirdPaymentInInstallments = new PaymentInInstallments();
$thirdPaymentInInstallmentsDAO = new ThirdPaymentInInstallmentsDAO();

$fifthPaymentInInstallments = new PaymentInInstallments();
$fifthPaymentInInstallmentsDAO = new FifthPaymentInInstallmentsDAO();

$fourthPaymentInInstallments = new PaymentInInstallments();
$fourthPaymentInInstallmentsDAO = new FourthPaymentInInstallmentsDAO();

$sixthPaymentInInstallments = new PaymentInInstallments();
$sixthPaymentInInstallmentsDAO = new SixthPaymentInInstallmentsDAO();

use Dompdf\Dompdf;

if (isset($_GET["pdf"])) {
    $idClient = $_GET["pdf"];

    $client = $clientDAO->findById($idClient);

    $cnh = $cnhDAO->findByClientId($idClient);
    $rates = $ratesDAO->findByClientId($idClient);

    $cashPayment = $cashPaymentDAO->findByClientId($idClient);
    $courseOnSight = $courseOnSightDAO->findByClientId($idClient);


    $firstPaymentInInstallments = $firstPaymentInInstallmentsDAO->findByClientId($idClient);        
    $secondPaymentInInstallments = $secondPaymentInInstallmentsDAO->findByClientId($idClient);
    $thirdPaymentInInstallments = $thirdPaymentInInstallmentsDAO->findByClientId($idClient);

    $fifthPaymentInInstallments = $fifthPaymentInInstallmentsDAO->findByClientId($idClient);
    $fourthPaymentInInstallments = $fourthPaymentInInstallmentsDAO->findByClientId($idClient);
    $sixthPaymentInInstallments = $sixthPaymentInInstallmentsDAO->findByClientId($idClient);

    $Email = !empty($client->getEmail()) ? $client->getEmail() : "Campo em branco";

    if ($client  and $cnh and $rates) {
$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-br'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<link rel='stylesheet'  type='text/css' href='pdf.css'>";
$dados .= "<title>Autoescola Lider - Gerar PDF</title>";
$dados .= "</head>";
$dados .= "<body>";
$dados = "<style>
    table {
       border-collapse: collapse;
       width: 80%;
       margin: 0 auto;
    }
    th, td {
       border: 1px solid #ddd;
       padding: 8px;
       text-align: center;
    }
    th {
      background-color: #f2f2f2;
    }

    .formField {
      text-align: left;
    }

    h1 {
      text-align: center;
      margin-bottom: 0;
    }

  h2 {
     text-align: center;
     margin-top: 0;
  }

  </style>

          <h1>". $client->getName() ."</h1>
          <h2>Ficha do aluno</h2>
          <br>

          <table>
          <tr>
              <td colspan='2'><strong>Dados do aluno</strong></td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Nome:</strong></td>
              <td class='formField'>" . $client->getName() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Email:</strong></td>
              <td class='formField'>" . $Email . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Nome da Responsável (Feminino):</strong></td>
              <td class='formField'>" . $client->getMother() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Nome do Responsável (Masculino):</strong></td>
              <td class='formField'>" . $client->getFather() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>RG:</strong></td>
              <td class='formField'>" . $client->getRg() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>RG-Expedição:</strong></td>
              <td class='formField'>" . $client->getRgExpedition() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>UF:</strong></td>
              <td class='formField'>" . $client->getUf() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Data de nascimento:</strong></td>
              <td class='formField'>" . $client->getBirthDate() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>CPF:</strong></td>
              <td class='formField'>" . $client->getCpf() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>RENACH SP:</strong></td>
              <td class='formField'>" . $client->getRenach() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Naturalidade:</strong></td>
              <td class='formField'>" . $client->getNaturalness() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Endereço:</strong></td>
              <td class='formField'>" . $client->getAddress() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Bairro:</strong></td>
              <td class='formField'>" . $client->getNeighborhood() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Numero de residência:</strong></td>
              <td class='formField'>" . $client->getNumber() . "</td>
          </tr>
  
          <tr>
          <td class='formField'><strong>Celular:</strong></td>
          <td class='formField'>" . $client->getCelphone() . "</td>
      </tr>
  
          <tr>
              <td class='formField'><strong>Telefone:</strong></td>
              <td class='formField'>" . $client->getTelephone() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Local de Atividade:</strong></td>
              <td class='formField'>" . $client->getActivityLocation() . "</td>
          </tr>
      </table>
      <br><br>
  
      <table>
          <tr>
              <td colspan='2'><strong>Dados da CNH</strong></td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Curso:</strong></td>
              <td class='formField'>" . $cnh->getCategory() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Categoria:</strong></td>
              <td class='formField'>" . $cnh->getType() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Data do exame médico:</strong></td>
              <td class='formField'>" . $cnh->getMedicalExam() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Numero de registro:</strong></td>
              <td class='formField'>" . $cnh->getRegistrationNumber() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Atualização Biometrica:</strong></td>
              <td class='formField'>" . $cnh->getBiometricUpdate() . "</td>
          </tr>
      </table>
      <br><br>
  
      <table>
          <tr>
              <td colspan='2'><strong>Dados de taxas</strong></td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Teórico:</strong></td>
              <td class='formField'>" . $rates->getTheoretic() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Pratico de Carro:</strong></td>
              <td class='formField'>" . $rates->getPractice1() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Pratico de Moto:</strong></td>
              <td class='formField'>" . $rates->getPractice2() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Emissão CNH:</strong></td>
              <td class='formField'>" . $rates->getEmissionCnh() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Reprova:</strong></td>
              <td class='formField'>" . $rates->getDisapprove() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Data Exame A:</strong></td>
              <td class='formField'>" . $rates->getExamA() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Data Exame B:</strong></td>
              <td class='formField'>" . $rates->getExamB() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Data Exame D:</strong></td>
              <td class='formField'>" . $rates->getExamD() . "</td>
          </tr>
      </table>
      <br><br>
          <table>
          <tr>
              <td colspan='2'><strong>Dados de curso a vista</strong></td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Valor do curso:</strong></td>
              <td class='formField'>" . $courseOnSight->getValueCourseOnSight() . "</td>
          </tr>
  
          <tr>
              <td class='formField'><strong>Data de pagamento do curso:</strong></td>
              <td class='formField'>" . $courseOnSight->getDateCourseOnSight() . "</td>
          </tr>
      </table>
      <br><br>
          <h2 style='text-align: right;'>Drive Master</h2>";

    $dados .= "<hr>";   
$dados .= "</body>";
$dados .= "</html>";

$dompdf = new Dompdf(['enable_remote' => true]);
$dompdf->loadHtml($dados);

$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream();

} else {
  echo "<script language=javascript>
  alert('ERRO: alguma informção do aluno não foi não encontrado!!!');
  location.href = 'controle-de-aluno.php';
  </script>";
}
}
?>