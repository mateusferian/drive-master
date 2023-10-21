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
include_once('./model/Payment.php');
include_once('./dao/PaymentDAO.php');
include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');

$client = new Client();
$clientdao = new ClientDAO();
$payment = new Payment();
$paymentdao = new PaymentDAO();
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
                                <small class="d-block">Dados de pagamento</small>
                            </h4>
                        </div>

                        <?php
                            include_once('include/progressBar.php');
                        ?>

                        <div class="card-body">
                            <form id="form4" action="controller/PaymentController.php" method="POST">
                                <div class="row mb-3 ml-1" hidden>
                                    <?php foreach ($clientdao->lastClient() as $client) : ?>
                                        <div class="col-sm-2  mt-3">
                                            <label for="idclient" class="form-label">Id Cliente:</label>
                                            <input type="number" class="form-control" id="idclient" name="idclient" value="<?= $client->getIdClient() ?>" readonly>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10 mx-auto text-center">
                                        <br>
                                        <div class="form-check form-check-inline ml-4 mr-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckCash" name="installmentType"
                                                    data-target="advancePayment">
                                                <label class="form-check-label" for="flexCheckCash">Modo a
                                                    vista:</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline ml-4 mr-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="installment" name="installmentType"
                                                    data-target="firstPaymentInstallment">
                                                <label class="form-check-label" for="installment">Parcelamento</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline ml-4 mr-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckCourse" name="installmentType"
                                                    data-target="secondPaymentInstallment">
                                                <label class="form-check-label" for="flexCheckCourse">Curso a
                                                    vista:</label>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-sm-12 mt-3" id="advancePayment" style="display: none;">
                                        <table class="table">
                                            <tr>
                                                <td>Pagamento Avista:</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" id="ValueOfFirstInstallment"
                                                        name="ValueOfFirstInstallment" step="0.01"
                                                        placeholder="Digite o valor avista">
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
                                        </table>
                                    </div>


                                    <div class="col-sm-12  mt-3 " id="paymentDueDate" style="display: none;">
                                        <label for="paymentDueDate" class="form-label">Vencimento de pagamento:</label>
                                        <input type="date" class="form-control" id="paymentDueDate"
                                            name="paymentDueDate" placeholder="Digite o vencimento de pagamento">
                                    </div>

                                    <div class="col-sm-6 mt-3" id="firstPaymentInstallment" style="display: none;">
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

                                    <div class="col-sm-6 mt-3" id="secondPaymentInstallment" style="display: none;">
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

                                    <div class="col-sm-6 mt-3" id="thirdPaymentInstallment" style="display: none;">
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

                                    <div class="col-sm-6 mt-3" id="fourthPaymentInstallment" style="display: none;">
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

                                    <div class="col-sm-6 mt-3" id="fifthPaymentInstallment" style="display: none;">
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

                                    <div class="col-sm-6 mt-3" id="sixthPaymentInstallment" style="display: none;">
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
                                                <select id="installmentMode" name="installmentMode" class="form-select">
                                                    <option selected>Informe qual a forma de pagamento dessa parcela
                                                    </option>
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