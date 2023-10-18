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

          <h1>Ficha do aluno</h1>
          <h2>" . $client->getName() ."</h2>
          <br>

          <table>
         <tr>
            <td colspan='2'><strong>Dados do aluno</strong></td>
         </tr>

          <tr>
            <td class='formField'>Nome:</td>
            <td class='formField'><strong>" . $client->getName() . "</strong></td>
          </tr>

           <tr>
            <td class='formField'>Email:</td>
            <td class='formField'><strong>" . $client->getEmail() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Nome da Responsável (Feminino):</td>
            <td class='formField'><strong>" . $client->getMother() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Nome do Responsável (Masculino):</td>
            <td class='formField'><strong>" . $client->getFather() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>RG:</td>
            <td class='formField'><strong>" . $client->getRg() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>RG-Expedição:</td>
            <td class='formField'><strong>" . $client->getRgExpedition() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>UF:</td>
            <td class='formField'><strong>" . $client->getUf() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Data de nascimento:</td>
            <td class='formField'><strong>" . $client->getBirthDate() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>CPF:</td>
            <td class='formField'><strong>" . $client->getCpf() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>RENACH SP:</td>
            <td class='formField'><strong>" . $client->getRenach() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Naturalidade:</td>
            <td class='formField'><strong>" . $client->getNaturalness() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Endereço:</td>
            <td class='formField'><strong>" . $client->getAddress() . "</strong></td>
          </tr>
          <tr>
          <td class='formField'>Bairro:</td>
          <td class='formField'><strong>" . $client->getNeighborhood() . "</strong></td>
        </tr>
          <tr>
            <td class='formField'>Numero de residência:</td>
            <td class='formField'><strong>" . $client->getNumber() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Celular:</td>
            <td class='formField'><strong>" . $client->getCelphone() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Telefone:</td>
            <td class='formField'><strong>" . $client->getTelephone() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Local de Atividade:</td>
            <td class='formField'><strong>" . $client->getActivityLocation() . "</strong></td>
          </tr>
          </table>
          <br><br>

          <table>
          <tr>
          <td colspan='2'><strong>Dados da CNH</strong></td>
            </tr>

            <td class='formField'>Curso:</td>
            <td class='formField'><strong>" . $cnh->getCategory() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Categoria:</td>
            <td class='formField'><strong>" . $cnh->getType() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Data do exame médico:</td>
            <td class='formField'><strong>" . $cnh->getMedicalExam() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Numero de registro:</td>
            <td class='formField'><strong>" . $cnh->getRegistrationNumber() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Atualização Biometrica:</td>
            <td class='formField'><strong>" . $cnh->getBiometricUpdate() . "</strong></td>
          </tr> </table>
          <br><br>


          <table>
          <tr>
          <td colspan='2'><strong>Dados de taxas</strong></td>
      </tr>
            <td class='formField'>Teórico:</td>
            <td class='formField'><strong>" . $rates->getTheoretic() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Pratico de Carro:</td>
            <td class='formField'><strong>" . $rates->getPractice1() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Pratico de Moto:</td>
            <td class='formField'><strong>" . $rates->getPractice2() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Emissão CNH:</td>
            <td class='formField'><strong>" . $rates->getEmissionCnh() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Reprova:</td>
            <td class='formField'><strong>" . $rates->getDisapprove() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Data Exame A:</td>
            <td class='formField'><strong>" . $rates->getExamA() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Data Exame B:</td>
            <td class='formField'><strong>" . $rates->getExamB() . "</strong></td>
          </tr>
          <tr>
            <td class='formField'>Data Exame D:</td>
            <td class='formField'><strong>" . $rates->getExamD() . "</strong></td>
          </tr>
          </table>
          <br><br>
          <h2 style='text-align: right;'>Auto Escola Lider</h2>";

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