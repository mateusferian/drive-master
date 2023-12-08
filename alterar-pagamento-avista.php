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
        <?php
    if (isset($_GET["al"])) {
        $idClient = $_GET["al"];

        $cashPayment = $cashPaymentDAO->findByClientId($idClient);

        if ($cashPayment) {
    ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">

                        <div class="card-header">
                            <h4 class="text-center font-weight-light my-4">
                                <span class="h3">Alterar Aluno</span>
                                <small class="d-block">Dados de pagamento a vista</small>
                            </h4>
                        </div>

                        <?php
                            include_once('include/progressBar.php');
                        ?>
                        <script src="js/displayPaymentMethods.js"></script>


                        <div class="card-body">
                            <form id="form4" action="controller/CashPaymentController.php" method="POST">
                            <div class="col-sm-12  mt-3" hidden>
                                    <label for="idclient" class="form-label">Id Do Cliente:</label>
                                    <input type="text" class="form-control" id="idclient" name="idclient"
                                        placeholder="Digite o numero de registro" pattern="[0-9]+"
                                        value="<?php if(isset($cashPayment) && $cashPayment->getIdClient()) { echo $cashPayment->getIdClient(); } ?>"
                                        readonly="readonly">
                                </div>

                                <div class="col-sm-12  mt-3" hidden>
                                    <label for="idcash" class="form-label">Id Pagamento A vista:</label>
                                    <input type="text" class="form-control" id="idcash" name="idcash"
                                        placeholder="Digite o numero de registro" pattern="[0-9]+"
                                        value="<?php if(isset($cashPayment) && $cashPayment->getidCashPayment()) { echo $cashPayment->getidCashPayment(); } ?>"
                                        readonly="readonly">
                                </div>
                                <div class="row">

                                    <div class="col-sm-12 mt-3">
                                        <table class="table">
                                            <tr>
                                                <td>Pagamento Avista:</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" id="value_cash_payment"
                                                        name="value_cash_payment" step="0.01"
                                                        placeholder="Digite o valor à vista"
                                                        pattern="^\d{1,3}(,\d{3})*(\.\d{1,2})?$"
                                                        title="Por favor, insira um valor válido. Exemplo: 1.000,00"
                                                        value="<?php if(isset($cashPayment) && $cashPayment->getValueCashPayment()) { echo $cashPayment->getValueCashPayment(); } ?>"
                                                        required>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="date" class="form-control" id="date_cash_payment"
                                                        name="date_cash_payment"
                                                        value="<?php if(isset($cashPayment) && $cashPayment->getDateCashPayment()) { echo $cashPayment->getDateCashPayment(); } ?>"
                                                        required>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>

                                    <script src="js/installment.js"></script>
                                    <br><br>
                                    <div class="mt-4 mb-0 d-flex justify-content-end">
                                        <button type="submit" class="btn customButton btn-lg"
                                            name="edit">Avançar</button>
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