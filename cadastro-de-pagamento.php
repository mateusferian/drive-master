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
                                <div class="row">
                                    <div class="col-sm-10 mx-auto text-center">
                                        <br>
                                        <div class="payment-options">
                                            <div class="form-check form-check-inline ml-4 mr-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="cashPayment"
                                                        id="flexCheckCash" name="installmentType"
                                                        data-target="advancePayment">
                                                    <label class="form-check-label" for="flexCheckCash">Modo a
                                                        vista:</label>
                                                </div>
                                            </div>

                                            <div class="form-check form-check-inline ml-4 mr-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="installment"
                                                        id="installment" name="installmentType"
                                                        data-target="firstPaymentInstallment">
                                                    <label class="form-check-label"
                                                        for="installment">Parcelamento</label>
                                                </div>
                                            </div>

                                            <div class="form-check form-check-inline ml-4 mr-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="courseToView"
                                                        id="flexCheckCourse" name="installmentType"
                                                        data-target="secondPaymentInstallment">
                                                    <label class="form-check-label" for="flexCheckCourse">Curso a
                                                        vista:</label>
                                                </div>
                                            </div>
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