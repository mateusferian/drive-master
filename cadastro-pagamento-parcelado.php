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
include_once('./dao/PaymentInInstallmentsDAO.php');
include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');

$client = new Client();
$clientdao = new ClientDAO();
$paymentInInstallments = new PaymentInInstallments();
$paymentInInstallmentsDAO = new PaymentInInstallmentsDAO();
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
                            <form id="form4" action="controller/PaymentInInstallmentsController.php" method="POST">
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
                                                    <input type="text" class="form-control" id="valueOfFirstInstallment" name="valueOfFirstInstallment" 
                                                    step="0.01" placeholder="Digite o valor à vista" 
                                                    pattern="^\d{1,3}(,\d{3})*(\.\d{1,2})?$" title="Por favor, insira um valor válido. Exemplo: 1.000,00">
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
                                                        <option value = "Parcelado no cartao">Parcelado no cartão</option>
                                                        <option value = "Parcelado no carne">Parcelado no carnê</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <select id="paymentStatus" name="paymentStatus" class="form-select">
                                                        <option selected>Situação de pagamento</option>
                                                        <option value = "Pagamento realizado" >Pagamento realizado</option>
                                                        <option value = "Em aberto">Em aberto</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <script src="js/installment.js"></script>
                                    <br><br>
                                    <div class="mt-4 mb-0 d-flex justify-content-end">
                                        <button type="submit" class="btn customButton btn-lg"
                                            name="save">finalizar</button>
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