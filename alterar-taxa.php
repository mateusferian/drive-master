<!DOCTYPE html>
<html lang="en">
<script src="js/progressionOfChanging.js"></script>
<?php
include_once('restrito.php');
include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
// include_once('include/carousel.php');
include_once('./conexao/Conexao.php');
include_once('./model/Rates.php');
include_once('./dao/RatesDAO.php');
include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');

$rates = new Rates();
$ratesdao = new RatesDAO();
$client = new Client();
$clientdao = new ClientDAO();
?>
<link rel="stylesheet" href="css/registrationProcesses.css">

<body>
    <main>
        <?php
    if (isset($_GET["al"])) {
        $idClient = $_GET["al"];

        $rates = $ratesdao->findByClientId($idClient);

        if ($rates) {
    ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">

                        <div class="card-header">
                            <h4 class="text-center font-weight-light my-4">
                                <span class="h3">Alterar Aluno</span>
                                <small class="d-block">Dados de Taxas</small>
                            </h4>
                        </div>
                        <?php
                            include_once('include/teste.php');
                        ?>

                        <script src="js/displayPaymentUpdate.js"></script>
                        
                        <div class="card-body">
                            <form action="controller/RatesController.php" method="POST">

                                <div class="col-sm-12  mt-3" hidden>
                                    <label for="idrates" class="form-label">Id Taxas:</label>
                                    <input type="text" class="form-control" id="idrates" name="idrates"
                                        placeholder="Digite o numero de registro" pattern="[0-9]+"
                                        value="<?php if(isset($rates) && $rates->getIdRates()) { echo $rates->getIdRates(); } ?>"
                                        readonly="readonly">
                                </div>

                                <div class="col-sm-12  mt-3" hidden>
                                                <label for="idclient" class="form-label">Id Aluno:</label>
                                                <input type="text" class="form-control" id="idclient" name="idclient"
                                                    placeholder="Digite o numero de registro" pattern="[0-9]+"
                                                    value="<?php if(isset($rates) && $rates->getIdClient()) { echo $rates->getIdClient(); } ?>"
                                                    readonly="readonly">
                                            </div>

                                <div class="row mb-3 ml-1">
                                    <div class="col-sm-6  mt-3">
                                        <label for="theoretical" class="form-label">Teórico:</label>
                                        <input type="date" class="form-control" id="theoretical" name="theoretic"
                                            value="<?php if(isset($rates) && $rates->getTheoretic()) { echo $rates->getTheoretic(); } ?>"
                                            required>
                                    </div>
                                    <div class="col-sm-6  mt-3">
                                        <label for="practiceCar" class="form-label">Pratico de Carro:</label>
                                        <input type="date" class="form-control" id="practiceCar" name="practice1"
                                            value="<?php if(isset($rates) && $rates->getPractice1()) { echo $rates->getPractice1(); } ?>"
                                            required>
                                    </div>
                                </div>

                                <div class="row mb-3 ml-1">
                                    <div class="col-sm-6  mt-3">
                                        <label for="practicalMotorcycle" class="form-label">Pratico de Moto:</label>
                                        <input type="date" class="form-control" id="practicalMotorcycle"
                                            name="practice2"
                                            value="<?php if(isset($rates) && $rates->getPractice2()) { echo $rates->getPractice2(); } ?>"
                                            required>
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="emission_cnh" class="form-label"> emissão CNH:</label>
                                        <input type="date" class="form-control" id="emission_cnh" name="emission_cnh"
                                            value="<?php if(isset($rates) && $rates->getEmissionCnh()) { echo $rates->getEmissionCnh(); } ?>"
                                            required>
                                    </div>
                                </div>

                                <div class="row mb-3 ml-1">
                                    <div class="col-sm-6  mt-3">
                                        <label for="disapprove" class="form-label">Reprova:</label>
                                        <input type="date" class="form-control" id="disapprove" name="disapprove"
                                            value="<?php if(isset($rates) && $rates->getDisapprove()) { echo $rates->getDisapprove(); } ?>"
                                            required>
                                    </div>
                                    <div class="col-sm-6  mt-3">
                                        <label for="dateExameA" class="form-label">Data Exame A:</label>
                                        <input type="date" class="form-control" id="dateExameA" name="exam_a"
                                            value="<?php if(isset($rates) && $rates->getExamA()) { echo $rates->getExamA(); } ?>"
                                            required>
                                    </div>
                                </div>

                                <div class="row mb-3 ml-1">
                                    <div class="col-sm-6  mt-3">
                                        <label for="dateExameB" class="form-label">Data Exame B:</label>
                                        <input type="date" class="form-control" id="dateExameB" name="exam_b"
                                            value="<?php if(isset($rates) && $rates->getExamB()) { echo $rates->getExamB(); } ?>"
                                            required>
                                    </div>
                                    <div class="col-sm-6  mt-3">
                                        <label for="dateExameD" class="form-label">Data Exame D:</label>
                                        <input type="date" class="form-control" id="dateExameD" name="exam_d"
                                            value="<?php if(isset($rates) && $rates->getExamD()) { echo $rates->getExamD(); } ?>"
                                            required>
                                    </div>
                                </div>

                                <div class="row mt-4 mb-3">
                                    <div class="mt-4 mb-0 d-flex justify-content-end">
                                        <button type="submit" class="btn customButton btn-lg"
                                            name="edit">Avançar</button>
                                    </div>
                                </div>

                                <br>
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