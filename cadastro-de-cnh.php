<!DOCTYPE html>
<html lang="en">
<script src="js/progressBar.js"></script>
<?php
include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
// include_once('include/carousel.php');
include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');

$client = new Client();
$clientdao = new ClientDAO();
?>
<link rel="stylesheet" href="css/registrationProcesses.css">

<body>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">

                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">CADASTRAR NOVO ALUNO</h3>
                        </div>


                        <?php
                            include_once('include/progressBar.php');
                        ?>

                        <div class="card-body">
                            <form id="form2" action="controller/CnhController.php" method="POST">
                                <div class="row">
                                    <fieldset class="row mb-0 mt-0">
                                        <div class="col-sm-10 mx-auto text-center">
                                            <br>
                                            <div class="form-check form-check-inline ml-4 mr-4">
                                                <input class="form-check-input" type="radio" name="course"
                                                    id="firstLicense" value="firstLicense" checked>
                                                <label class="form-check-label" for="firstLicense">
                                                    1 Habilitação
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline ml-4 mr-4">
                                                <input class="form-check-input" type="radio" name="course"
                                                    id="categoryAddition" value="categoryAddition">
                                                <label class="form-check-label" for="categoryAddition">
                                                    Adição de categoria
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline ml-4 mr-4">
                                                <input class="form-check-input" type="radio" name="course"
                                                    id="rehabilitation" value="rehabilitation">
                                                <label class="form-check-label" for="rehabilitation">
                                                    Reabilitação
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>


                                    <div class="col-sm-12 mt-3">
                                        <label for="category" class="form-label">Categoria</label>
                                        <select id="category" name="category" class="form-select">
                                            <option selected>Informe qual categoria o aluno irá fazer</option>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>AB</option>
                                            <option>C</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="dateOfMedicExam" class="form-label">Data do exame médico:</label>
                                        <input type="date" class="form-control" id="dateOfMedicExam"
                                            name="dateOfMedicExam">
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="biometricUpdate" class="form-label">Atualização Biometrica:</label>
                                        <input type="date" class="form-control" id="biometricUpdate"
                                            name="biometricUpdate">
                                    </div>

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