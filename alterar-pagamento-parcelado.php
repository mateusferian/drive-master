<!DOCTYPE html>
<html lang="en">
<script src="js/progressBar.js"></script>
<?php
include_once('restrito.php');
include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
// include_once('include/carousel.php');
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

<link rel="stylesheet" href="css/registrationProcesses.css">

<body>
    <main>
        <?php
    if (isset($_GET["al"])) {
        $idClient = $_GET["al"];

        $firstPaymentInInstallments = $firstPaymentInInstallmentsDAO->findByClientId($idClient);
        $secondPaymentInInstallments = $secondPaymentInInstallmentsDAO->findByClientId($idClient);
        $thirdPaymentInInstallments = $thirdPaymentInInstallmentsDAO->findByClientId($idClient);

        $fourthPaymentInInstallments = $fourthPaymentInInstallmentsDAO->findByClientId($idClient);
        $fifthPaymentInInstallments = $fifthPaymentInInstallmentsDAO->findByClientId($idClient);
        $sixthPaymentInInstallments = $sixthPaymentInInstallmentsDAO->findByClientId($idClient);

        $installments = [
            1 => $firstPaymentInInstallments,
            2 => $secondPaymentInInstallments,
            3 => $thirdPaymentInInstallments,
            4 => $fourthPaymentInInstallments,
            5 => $fifthPaymentInInstallments,
            6 => $sixthPaymentInInstallments,
        ];

        if ($firstPaymentInInstallments) {
    ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">

                        <div class="card-header">
                            <h4 class="text-center font-weight-light my-4">
                                <span class="h3">Cadastro de Aluno</span>
                                <small class="d-block">Dados de pagamento a vista</small>
                            </h4>
                        </div>

                        <?php
                            include_once('include/progressBar.php');
                        ?>
                        <script src="js/displayPaymentMethods.js"></script>

                        <div class="card-body">
                            <form id="form4" action="controller/PaymentInInstallmentsController.php" method="POST">

                                <div class="row">

                                    <div class="col-sm-12  mt-3" hidden>
                                        <label for="idclient" class="form-label">Id do Aluno:</label>
                                        <input type="number" class="form-control" id="idclient" name="idclient"
                                            value="<?php if(isset($firstPaymentInInstallments) && $firstPaymentInInstallments->getIdClient()) { echo $firstPaymentInInstallments->getIdClient(); } ?>"
                                            readonly="readonly">
                                    </div>

                                    <div class="col-sm-12 mt-3" id="paymentInstallments">
                                        <?php for ($i = 1; $i <= 6; $i++) : ?>
                                        <table class="table">
                                            <tr>
                                                <td><?= $i ?>º Parcela:</td>
                                            </tr>
                                            <tr hidden>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="IdPaymentInInstallments<?= $i ?>" step="0.01"
                                                        placeholder="Id da <?= $i ?>ª parcela"
                                                        pattern="^\d{1,3}(,\d{3})*(\.\d{1,2})?$"
                                                        title="Por favor, insira um valor válido. Exemplo: 1.000,00"
                                                        value="<?php if(isset($installments[$i]) && $installments[$i]->getIdPaymentInInstallments()) { echo $installments[$i]->getIdPaymentInInstallments(); } ?>"
                                                        required>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="valueOfInstallment<?= $i ?>" step="0.01"
                                                        placeholder="Digite o valor da <?= $i ?>ª parcela"
                                                        pattern="^\d{1,3}(,\d{3})*(\.\d{1,2})?$"
                                                        title="Por favor, insira um valor válido. Exemplo: 1.000,00"
                                                        value="<?php if(isset($installments[$i]) && $installments[$i]->getInstallmentValue()) { echo $installments[$i]->getInstallmentValue(); } ?>"
                                                        required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="date" class="form-control"
                                                        name="dateOfInstallment<?= $i ?>"
                                                        value="<?php if(isset($installments[$i]) && $installments[$i]->getInstallmentDate()) { echo $installments[$i]->getInstallmentDate(); } ?>"
                                                        required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select name="installmentMode<?= $i ?>" class="form-select"
                                                        required>
                                                        <option
                                                            <?= ($installments[$i]->getInstallmentMode() == 'Parcelado no cartão') ? 'selected' : ''; ?>>
                                                            Parcelado no cartão</option>
                                                        <option
                                                            <?= ($installments[$i]->getInstallmentMode() == 'Parcelado no carnê') ? 'selected' : ''; ?>>
                                                            Parcelado no carnê</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select name="paymentStatus<?= $i ?>" class="form-select" required>
                                                        <option
                                                            <?= ($installments[$i]->getInstallmentStatus() == 'Pagamento realizado') ? 'selected' : ''; ?>>
                                                            Pagamento realizado</option>
                                                        <option
                                                            <?= ($installments[$i]->getInstallmentStatus() == 'Em aberto') ? 'selected' : ''; ?>>
                                                            Em aberto</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php endfor; ?>
                                    </div>


                                    <script src="js/installment.js"></script>
                                    <br><br>
                                    <div class="mt-4 mb-0 d-flex justify-content-end">
                                        <button type="submit" class="btn customButton btn-lg"
                                            name="edit">Finalziar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
            }?>
    </main>
    <br><br>
    <?php
include_once('include/footer.php');
include_once('include/scrollTop.php');
?>
</body>

</html>