<!DOCTYPE html>
<html lang="en">
<script src="js/progressBar.js"></script>
<?php
include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
// include_once('include/carousel.php');
include_once('./model/Cnh.php');
include_once('./dao/CnhDAO.php');

$Cnh = new Cnh();
$CnhDAO = new CnhDAO();
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
                                <small class="d-block">Dados da CNH</small>
                            </h4>
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
                                                    id="1 Habilitação" value="1 Habilitação" checked>
                                                <label class="form-check-label" for="1 Habilitação">
                                                    1 Habilitação
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline ml-4 mr-4">
                                                <input class="form-check-input" type="radio" name="course"
                                                    id="Adição de categoria" value="adição de categoria">
                                                <label class="form-check-label" for="Adição de categoria">
                                                    Adição de categoria
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline ml-4 mr-4">
                                                <input class="form-check-input" type="radio" name="course"
                                                    id="Reabilitação" value="Reabilitação">
                                                <label class="form-check-label" for="Reabilitação">
                                                    Reabilitação
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="col-sm-12  mt-3">
                                        <label for="registrationNumber" class="form-label">Numero de registro:</label>
                                        <input type="text" class="form-control" id="registrationNumber"
                                            name="registrationNumber" placeholder="Digite o numero de registro">
                                    </div>

                                    <div class="col-sm-4 mt-3">
                                        <label for="category" class="form-label">Categoria</label>
                                        <select id="category" name="category" class="form-select">
                                            <option selected>Informe qual categoria o aluno irá fazer</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="C">C</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-4  mt-3">
                                        <label for="dateOfMedicExam" class="form-label">Data do exame médico:</label>
                                        <input type="date" class="form-control" id="dateOfMedicExam"
                                            name="dateOfMedicExam">
                                    </div>

                                    <div class="col-sm-4  mt-3">
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