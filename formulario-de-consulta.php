<!DOCTYPE html>
<html lang="en">
<link href="css/consult.css" rel="stylesheet">
<?php
include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
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
?>

<body>
    <main>
        <?php
    if ((isset($_GET["consulta"])) || (isset($_GET["fixa-do-aluno"]))) {
        $idClient = isset($_GET["consulta"]) ? $_GET["consulta"] : (isset($_GET["fixa-do-aluno"]) ? $_GET["fixa-do-aluno"] : null);


        $client = $clientDAO->findById($idClient);

        $cnh = $cnhDAO->findByClientId($idClient);
        $rates = $ratesDAO->findByClientId($idClient);

        $courseOnSight = $courseOnSightDAO->findByClientId($idClient);
        $cashPayment = $cashPaymentDAO->findByClientId($idClient);

        $firstPaymentInInstallments = $firstPaymentInInstallmentsDAO->findByClientId($idClient);
        $secondPaymentInInstallments = $secondPaymentInInstallmentsDAO->findByClientId($idClient);
        $thirdPaymentInInstallments = $thirdPaymentInInstallmentsDAO->findByClientId($idClient);

        $fifthPaymentInInstallments = $fifthPaymentInInstallmentsDAO->findByClientId($idClient);
        $fourthPaymentInInstallments = $fourthPaymentInInstallmentsDAO->findByClientId($idClient);
        $sixthPaymentInInstallments = $sixthPaymentInInstallmentsDAO->findByClientId($idClient);

        if ($client  and $cnh and $rates) {
    ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">

                        <div class="card-header">
                            <h4 class="text-center font-weight-light my-4">
                                <span class="h3"><?php echo strtoupper($client->getName()); ?></span>
                                <small class="d-block">Fixa do aluno</small>
                            </h4>
                        </div>


                        <table class="table table-bordered mt-4">
                            <tr>
                                <td colspan='2' class="h4"><strong>Dados do aluno</strong></td>
                            </tr>

                            <tr>
                                <th class="col-6">Nome de Aluno:</th>
                                <td class="col-6"><?php echo $client->getName(); ?></td>
                            <tr>
                                <th class="col-sm-6">Email:</th>
                                <td><?php echo $client->getEmail(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Nome da Responsável (Feminino):</th>
                                <td><?php echo $client->getMother(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Nome do Responsável (Masculino):</th>
                                <td><?php echo $client->getFather(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">RG:</th>
                                <td><?php echo $client->getRg(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">RG-Expedição:</th>
                                <td><?php echo $client->getRgExpedition(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">UF:</th>
                                <td><?php echo $client->getUf(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Data de nascimento:</th>
                                <td><?php echo $client->getBirthDate(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">CPF:</th>
                                <td><?php echo $client->getCpf(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">RENACH SP:</th>
                                <td><?php echo $client->getRenach(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Naturalidade:</th>
                                <td><?php echo $client->getNaturalness(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Endereço:</th>
                                <td><?php echo $client->getAddress(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Bairro:</th>
                                <td><?php echo $client->getNeighborhood(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Numero de residência:</th>
                                <td><?php echo $client->getNumber(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Celular:</th>
                                <td><?php echo $client->getCelphone(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Telefone:</th>
                                <td><?php echo $client->getTelephone(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Local de Atividade:</th>
                                <td><?php echo $client->getActivityLocation(); ?></td>
                            </tr>
                        </table>

                        <br><br>

                        <table class="table table-bordered mt-4">
                            <tr>
                                <td colspan='2' class="h4"><strong>Dados da CNH</strong></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Curso:</th>
                                <td><?php echo $cnh->getCategory(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Categoria:</th>
                                <td><?php echo $cnh->getType(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Data do exame médico:</th>
                                <td><?php echo $cnh->getMedicalExam(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Numero de registro:</th>
                                <td><?php echo $cnh->getRegistrationNumber(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Atualização Biometrica:</th>
                                <td><?php echo $cnh->getBiometricUpdate(); ?></td>
                            </tr>
                        </table>



                        <table class="table table-bordered mt-4">
                            <br><br><br><br>
                            <tr>
                                <td colspan='2' class="h4"><strong>Dados de taxas</strong></td>
                            </tr>

                            <tr>
                                <th class="col-sm-6">Teórico:</th>
                                <td><?php echo $rates->getTheoretic(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Pratico de Carro:</th>
                                <td><?php echo $rates->getPractice1(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Pratico de Moto:</th>
                                <td><?php echo $rates->getPractice2(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">emissão CNH:</th>
                                <td><?php echo $rates->getEmissionCnh(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Reprova:</th>
                                <td><?php echo $rates->getDisapprove(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Data Exame A:</th>
                                <td><?php echo $rates->getExamA(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Data Exame B:</th>
                                <td><?php echo $rates->getExamB(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Data Exame D:</th>
                                <td><?php echo $rates->getExamD(); ?></td>
                            </tr>
                        </table>

                        <table class="table table-bordered mt-4">
                            <br><br><br><br>
                            <tr>
                                <td colspan='2' class="h4"><strong>Dados de pagamento a vista</strong></td>
                            </tr>

                            <tr>
                                <th class="col-sm-6">Valor do Pagamento:</th>
                                <td><?php echo $cashPayment->getValueCashPayment(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Data de pagamento:</th>
                                <td><?php echo $cashPayment->getDateCashPayment(); ?></td>
                            </tr>

                        </table>

                        <table class="table table-bordered mt-4">
                            <br><br><br><br>
                            <tr>
                                <td colspan='2' class="h4"><strong>Dados de curso a vista</strong></td>
                            </tr>

                            <tr>
                                <th class="col-sm-6">Valor do curso:</th>
                                <td><?php echo $courseOnSight->getValueCourseOnSight(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Data de pagamento do curso:</th>
                                <td><?php echo $courseOnSight->getDateCourseOnSight(); ?></td>
                            </tr>

                        </table>

                        <table class="table table-bordered mt-4">
                            <br><br><br><br>
                            <tr>
                                <td colspan='2' class="h4"><strong>Primeira Parcela</strong></td>
                            </tr>

                            <tr>
                                <th class="col-sm-6">Valor da parcela:</th>
                                <td><?php echo $firstPaymentInInstallments->getInstallmentValue(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Data de pagamento da parcela:</th>
                                <td><?php echo $firstPaymentInInstallments->getInstallmentDate(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Modo de parcelamento</th>
                                <td><?php echo $firstPaymentInInstallments->getInstallmentMode(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Status de parcela:</th>
                                <td><?php echo $firstPaymentInInstallments->getInstallmentStatus(); ?></td>
                            </tr>
                        </table>

                        <table class="table table-bordered mt-4">
                            <br><br><br><br>
                            <tr>
                                <td colspan='2' class="h4"><strong>Segunda Parcela</strong></td>
                            </tr>

                            <tr>
                                <th class="col-sm-6">Valor da parcela:</th>
                                <td><?php echo $secondPaymentInInstallments->getInstallmentValue(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Data de pagamento da parcela:</th>
                                <td><?php echo $secondPaymentInInstallments->getInstallmentDate(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Modo de parcelamento</th>
                                <td><?php echo $secondPaymentInInstallments->getInstallmentMode(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Status de parcela:</th>
                                <td><?php echo $secondPaymentInInstallments->getInstallmentStatus(); ?></td>
                            </tr>
                        </table>

                        <table class="table table-bordered mt-4">
                            <br><br><br><br>
                            <tr>
                                <td colspan='2' class="h4"><strong>Terceira Parcela</strong></td>
                            </tr>

                            <tr>
                                <th class="col-sm-6">Valor da parcela:</th>
                                <td><?php echo $thirdPaymentInInstallments->getInstallmentValue(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Data de pagamento da parcela:</th>
                                <td><?php echo $thirdPaymentInInstallments->getInstallmentDate(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Modo de parcelamento</th>
                                <td><?php echo $thirdPaymentInInstallments->getInstallmentMode(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Status de parcela:</th>
                                <td><?php echo $thirdPaymentInInstallments->getInstallmentStatus(); ?></td>
                            </tr>
                        </table>

                        <table class="table table-bordered mt-4">
                            <br><br><br><br>
                            <tr>
                                <td colspan='2' class="h4"><strong>Quarta Parcela</strong></td>
                            </tr>

                            <tr>
                                <th class="col-sm-6">Valor da parcela:</th>
                                <td><?php echo $fourthPaymentInInstallments->getInstallmentValue(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Data de pagamento da parcela:</th>
                                <td><?php echo $fourthPaymentInInstallments->getInstallmentDate(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Modo de parcelamento</th>
                                <td><?php echo $fourthPaymentInInstallments->getInstallmentMode(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Status de parcela:</th>
                                <td><?php echo $fourthPaymentInInstallments->getInstallmentStatus(); ?></td>
                            </tr>
                        </table>

                        <table class="table table-bordered mt-4">
                            <br><br><br><br>
                            <tr>
                                <td colspan='2' class="h4"><strong>Quinta Parcela</strong></td>
                            </tr>

                            <tr>
                                <th class="col-sm-6">Valor da parcela:</th>
                                <td><?php echo $fifthPaymentInInstallments->getInstallmentValue(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Data de pagamento da parcela:</th>
                                <td><?php echo $fifthPaymentInInstallments->getInstallmentDate(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Modo de parcelamento</th>
                                <td><?php echo $fifthPaymentInInstallments->getInstallmentMode(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Status de parcela:</th>
                                <td><?php echo $fifthPaymentInInstallments->getInstallmentStatus(); ?></td>
                            </tr>
                        </table>

                        <table class="table table-bordered mt-4">
                            <br><br><br><br>
                            <tr>
                                <td colspan='2' class="h4"><strong>Sexta Parcela</strong></td>
                            </tr>

                            <tr>
                                <th class="col-sm-6">Valor da parcela:</th>
                                <td><?php echo $sixthPaymentInInstallments->getInstallmentValue(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Data de pagamento da parcela:</th>
                                <td><?php echo $sixthPaymentInInstallments->getInstallmentDate(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Modo de parcelamento</th>
                                <td><?php echo $sixthPaymentInInstallments->getInstallmentMode(); ?></td>
                            </tr>
                            <tr>
                                <th class="col-sm-6">Status de parcela:</th>
                                <td><?php echo $sixthPaymentInInstallments->getInstallmentStatus(); ?></td>
                            </tr>
                        </table>
                        <div class="row justify-content-between mt-8 text-center">
                            <div class="col-4">
                                <br><br>
                                <button type="button" name="voltar" class="btn customButton"
                                    onclick="window.location.href = 'controle-de-aluno.php';">Ir para controle de
                                    aluno</button>
                                <br><br>
                            </div>

                            <div class="col-4">
                                <br><br>
                                <a href="gerar-pdf-do-aluno.php?pdf=<?= $client->getIdClient() ?>">
                                    <button type="button" name="voltar" class="btn customButton"
                                        onclick="window.location.href = 'gerar-pdf-do-aluno.php?pdf=<?= $client->getIdClient() ?>'">Alterar
                                        dados do aluno</button>
                                    <br><br>
                                </a>
                            </div>

                            <div class="col-4">
                                <br><br>
                                <a href="gerar-pdf-do-aluno.php?pdf=<?= $client->getIdClient() ?>">
                                    <button type="button" name="voltar" class="btn customButton"
                                        onclick="window.location.href = 'gerar-pdf-do-aluno.php?pdf=<?= $client->getIdClient() ?>'">Baixar
                                        PDF dos dados do aluno</button>
                                    <br><br>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-center py-3"></div>
        </div>
        </div>
        </div>
        <?php
        } else {
            echo "<script language=javascript>
            alert('ERRO: alguma informção do aluno não foi não encontrado!!!');
            location.href = 'controle-de-aluno.php';
            </script>";
        }
    }
    include_once('include/studentRecordButtons.php');
    ?>
    
    </main>
    <br><br>
    <?php
    include_once('include/footer.php');
    include_once('include/scrollTop.php');
    ?>
</body>

</html>