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
include_once('./model/CashPayment.php');
include_once('./dao/CashPaymentDAO.php');
include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');

$client = new Client();
$clientdao = new ClientDAO();
$cashPayment = new CashPayment();
$cashPaymentDAO = new CashPaymentDAO();
?>
<link rel="stylesheet" href="css/registrationProcesses.css">

<body>
    <main>
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
                            <form id="form4" action="controller/CashPaymentController.php" method="POST">
                                <div class="row mb-3 ml-1" hidden>
                                    <?php foreach ($clientdao->lastClient() as $client) : ?>
                                        <div class="col-sm-2  mt-3">
                                            <label for="idclient" class="form-label">Id Cliente:</label>
                                            <input type="number" class="form-control" id="idclient" name="idclient" value="<?= $client->getIdClient() ?>" readonly>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <div class="row">

                                <div class="col-sm-6 mt-3" id="firstPaymentInstallment">
                                        <table class="table">
                                            <tr>
                                                <td>1º Parcela:</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" id="valueOfFirstInstallment"
                                                        name="valueOfFirstInstallment" step="0.01"
                                                        placeholder="Digite o valor da primeira parcela">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="date" class="form-control" id="dateOfFirstInstallment"
                                                        name="dateOfFirstInstallment">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <select id="installmentMode" name="installmentMode"
                                                        class="form-select">
                                                        <option selected>forma de pagamento dessa parcela</option>
                                                        <option>Parcelado no cartão</option>
                                                        <option>Parcelado no carnê</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <select id="paymentStatus" name="paymentStatus" class="form-select">
                                                        <option selected>Situação de pagamento</option>
                                                        <option>Pagamento realizado</option>
                                                        <option>Em aberto</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="col-sm-6 mt-3" id="secondPaymentInstallment">
                                        <table class="table">
                                            <tr>
                                                <td>2º Parcela:</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        id="valueOfSecondInstallment" name="valueOfSecondInstallment"
                                                        step="0.01" placeholder="Digite o valor da segunda parcela">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="date" class="form-control" id="dateOfSecondInstallment"
                                                        name="dateOfSecondInstallment">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select id="installmentModeSecondInstallment" name="installmentModeSecondInstallment"
                                                        class="form-select">
                                                        <option selected>forma de pagamento dessa parcela</option>
                                                        <option>Parcelado no cartão</option>
                                                        <option>Parcelado no carnê</option>
                                                    </select>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select id="paymentStatusSecondInstallment" name="paymentStatusSecondInstallment" class="form-select">
                                                        <option selected>Situação de pagamento</option>
                                                        <option>Pagamento realizado</option>
                                                        <option>Em aberto</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="col-sm-6 mt-3" id="thirdPaymentInstallment">
                                        <table class="table">
                                            <tr>
                                                <td>3º Parcela:</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" id="valueOfThirdInstallment"
                                                        name="valueOfThirdInstallment" step="0.01"
                                                        placeholder="Digite o valor da terceira parcela">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="date" class="form-control" id="dateOfThirdInstallment"
                                                        name="dateOfThirdInstallment">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select id="installmentModeThirdInstallment" name="installmentModeThirdInstallment"
                                                        class="form-select">
                                                        <option selected>forma de pagamento dessa parcela</option>
                                                        <option>Parcelado no cartão</option>
                                                        <option>Parcelado no carnê</option>
                                                    </select>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select id="paymentStatusThirdInstallment" name="paymentStatusThirdInstallment" class="form-select">
                                                        <option selected>Situação de pagamento</option>
                                                        <option>Pagamento realizado</option>
                                                        <option>Em aberto</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="col-sm-6 mt-3" id="fourthPaymentInstallment">
                                        <table class="table">
                                            <tr>
                                                <td>4º Parcela:</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        id="valueOfFourthInstallment" name="valueOfFourthInstallment"
                                                        step="0.01" placeholder="Digite o valor da quarta parcela">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="date" class="form-control" id="dateOfFourthInstallment"
                                                        name="dateOfFourthInstallment">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select id="installmentModeFourthInstallment" name="installmentModeFourthInstallment"
                                                        class="form-select">
                                                        <option selected>forma de pagamento dessa parcela</option>
                                                        <option>Parcelado no cartão</option>
                                                        <option>Parcelado no carnê</option>
                                                    </select>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select id="paymentStatusFourthInstallment" name="paymentStatusFourthInstallment" class="form-select">
                                                        <option selected>Situação de pagamento</option>
                                                        <option>Pagamento realizado</option>
                                                        <option>Em aberto</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="col-sm-6 mt-3" id="fifthPaymentInstallment" >
                                        <table class="table">
                                            <tr>
                                                <td>5º Parcela:</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" id="valueOfFifthInstallment"
                                                        name="valueOfFifthInstallment" step="0.01"
                                                        placeholder="Digite o valor da quinta parcela">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="date" class="form-control" id="dateOfFifthInstallment"
                                                        name="dateOfFifthInstallment">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select id="installmentModeFifthInstallment" name="installmentModeFifthInstallment"
                                                        class="form-select">
                                                        <option selected>forma de pagamento dessa parcela</option>
                                                        <option>Parcelado no cartão</option>
                                                        <option>Parcelado no carnê</option>
                                                    </select>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select id="paymentStatusFifthInstallment" name="paymentStatusFifthInstallment" class="form-select">
                                                        <option selected>Situação de pagamento</option>
                                                        <option>Pagamento realizado</option>
                                                        <option>Em aberto</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="col-sm-6 mt-3" id="sixthPaymentInstallment" >
                                        <table class="table">
                                            <tr>
                                                <td>6º Parcela:</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" id="valueOfSixthInstallment"
                                                        name="valueOfSixthInstallment" step="0.01"
                                                        placeholder="Digite o valor da sexta parcela">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="date" class="form-control" id="dateOfSixthInstallment"
                                                        name="dateOfSixthInstallment">
                                                </td>
                                            </tr>
                                            <td>
                                                <select id="installmentModeSixthInstallment" name="installmentModeSixthInstallment" class="form-select">
                                                    <option selected>Informe qual a forma de pagamento dessa parcela
                                                    </option>
                                                    <option>Parcelado no cartão</option>
                                                    <option>Parcelado no carnê</option>
                                                </select>

                                            </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select id="paymentStatusSixthInstallment" name="paymentStatusSixthInstallment" class="form-select">
                                                        <option selected>Situação de pagamento</option>
                                                        <option>Pagamento realizado</option>
                                                        <option>Em aberto</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <script src="js/installment.js"></script>
                                    <br><br>
                                    <div class="mt-4 mb-0 d-flex justify-content-end">
                                        <button type="submit" class="btn customButton btn-lg"
                                            name="save">Avançar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <br><br>
    <?php
include_once('include/footer.php');
include_once('include/scrollTop.php');
?>
</body>

</html>