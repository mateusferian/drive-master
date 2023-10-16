<!DOCTYPE html>
<html lang="en">
<script src="js/progressBar.js"></script> 
<?php
include_once('restrito.php');
include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
// include_once('include/carousel.php');
include_once('./model/Rates.php');
include_once('./dao/RatesDAO.php');

$rates = new Rates();
$ratesDAO = new RatesDAO();
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
                                <small class="d-block">Dados de taxas</small>
                            </h4>
                        </div>

                        <?php
                            include_once('include/progressBar.php');
                        ?>

                        <div class="card-body">
                            <form id="form3" action="controller/RatesController.php" method="POST">
                                <div class="row">

                                    <div class="col-sm-6  mt-3">
                                        <label for="theoretical" class="form-label">Teórico:</label>
                                        <input type="date" class="form-control" id="theoretical" name="theoretical">
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="practiceCar" class="form-label">Pratico de Carro:</label>
                                        <input type="date" class="form-control" id="practiceCar" name="practiceCar">
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="practicalMotorcycle" class="form-label">Pratico de Moto:</label>
                                        <input type="date" class="form-control" id="practicalMotorcycle"
                                            name="practicalMotorcycle">
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="cnh" class="form-label"> emissão CNH:</label>
                                        <input type="date" class="form-control" id="cnh" name="cnh">
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="disapprove" class="form-label">Reprova:</label>
                                        <input type="date" class="form-control" id="disapprove" name="disapprove">
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="dateExameA" class="form-label">Data Exame A:</label>
                                        <input type="date" class="form-control" id="dateExameA" name="dateExameA">
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="dateExameB" class="form-label">Data Exame B:</label>
                                        <input type="date" class="form-control" id="dateExameB" name="dateExameB">
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="dateExameD" class="form-label">Data Exame D:</label>
                                        <input type="date" class="form-control" id="dateExameD" name="dateExameD">

                                    </div>
                                    <br><br>
                                    <div class="mt-4 mb-0 d-flex justify-content-end">
                                        <button type="submit"  class="btn customButton btn-lg" name="save">Avançar</button>
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