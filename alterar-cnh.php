<!DOCTYPE html>
<html lang="en">
<script src="js/progressionOfChanging.js"></script>
<?php
include_once('restrito.php');
include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
include_once('./conexao/Conexao.php');

include_once('./model/Cnh.php');
include_once('./dao/CnhDAO.php');

$cnh = new Cnh();
$cnhDAO = new CnhDAO();
?>
<link rel="stylesheet" href="css/registrationProcesses.css">

<body>
    <main>
        <?php
    if (isset($_GET["al"])) {
        $idClient = $_GET["al"];

        $cnh = $cnhDAO->findByClientId($idClient);

        if ($cnh) {
    ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">

                        <div class="card-header">
                            <h4 class="text-center font-weight-light my-4">
                                <span class="h3">Alterar Aluno</span>
                                <small class="d-block">Dados da CNH</small>
                            </h4>
                        </div>


                        <?php
                            include_once('include/changeProgressBar.php');
                        ?>
                        <script src="js/displayPaymentUpdate.js"></script>

                        <div class="card-body">
                            <form action="controller/CnhController.php" method="POST">
                                <div class="row ml-1">
                                    <fieldset class="row mb-0 mt-0">
                                        <div class="col-sm-10 mx-auto text-center">
                                            <br>

                                            <div class="col-sm-12  mt-3" hidden>
                                                <label for="id_cnh" class="form-label">Id Cnh:</label>
                                                <input type="text" class="form-control" id="idcnh" name="idcnh"
                                                    placeholder="Digite o numero de registro" pattern="[0-9]+"
                                                    value="<?php if(isset($cnh) && $cnh->getIdCnh()) { echo $cnh->getIdCnh(); } ?>"
                                                    readonly="readonly">
                                            </div>

                                            <div class="col-sm-12  mt-3" hidden>
                                                <label for="idclient" class="form-label">Id Aluno:</label>
                                                <input type="text" class="form-control" id="idclient" name="idclient"
                                                    placeholder="Digite o numero de registro" pattern="[0-9]+"
                                                    value="<?php if(isset($cnh) && $cnh->getIdClient()) { echo $cnh->getIdClient(); } ?>"
                                                    readonly="readonly">
                                            </div>

                                            <div class="form-check form-check-inline ml-4 mr-4">
                                                <input class="form-check-input" type="radio" name="type_cnh"
                                                    id="1 Habilitação" value="1 Habilitação"
                                                    <?php if (!isset($cnh) || (isset($cnh) && $cnh->getType() == '1 Habilitação')) { echo 'checked'; } ?>
                                                    >
                                                <label class="form-check-label" for="1 Habilitação">
                                                    1 Habilitação
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline ml-4 mr-4">
                                                <input class="form-check-input" type="radio" name="type_cnh"
                                                    id="Adição de categoria" value="adição de categoria"
                                                    <?php if (isset($cnh) && $cnh->getType() == 'adição de categoria') { echo 'checked'; } ?> >
                                                <label class="form-check-label" for="Adição de categoria">
                                                    Adição de categoria
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline ml-4 mr-4">
                                                <input class="form-check-input" type="radio" name="type_cnh"
                                                    id="Reabilitação" value="Reabilitação"
                                                    <?php if (isset($cnh) && $cnh->getType() == 'Reabilitação') { echo 'checked'; } ?>>
                                                <label class="form-check-label" for="Reabilitação">
                                                    Reabilitação
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>

                                </div>
                                <div class="row ml-1">
                                    <div class="col-sm-12  mt-3">
                                        <label for="registrationNumber" class="form-label">Numero de registro:</label>
                                        <input type="text" class="form-control" id="registrationNumber"
                                            name="registration_number" placeholder="Digite o numero de registro"
                                            pattern="[0-9]+" title="Apenas números são permitidos"
                                            value="<?php if(isset($cnh) && $cnh->getRegistrationNumber()) { echo $cnh->getRegistrationNumber(); } ?>"
                                            required>
                                    </div>
                                </div>
                                <div class="row ml-1">
                                    <div class="col-sm-4  mt-3">
                                        <label for="category" class="form-label">Categoria</label>
                                        <select id="category" name="category" class="form-select" required>
                                            <option value="A"
                                                <?php if(isset($cnh) && $cnh->getCategory() == 'A') { echo 'selected'; } ?>>
                                                A</option>
                                            <option value="B"
                                                <?php if(isset($cnh) && $cnh->getCategory() == 'B') { echo 'selected'; } ?>>
                                                B</option>
                                            <option value="AB"
                                                <?php if(isset($cnh) && $cnh->getCategory() == 'AB') { echo 'selected'; } ?>>
                                                AB</option>
                                            <option value="C"
                                                <?php if(isset($cnh) && $cnh->getCategory() == 'C') { echo 'selected'; } ?>>
                                                C</option>

                                        </select>
                                        <script src="js/selectValidation.js"></script>
                                    </div>
                                    <div class="col-sm-4  mt-3">
                                        <label for="dateOfMedicExam" class="form-label">Data do exame médico:</label>
                                        <input type="date" class="form-control" id="dateOfMedicExam" name="medical_exam"
                                            value="<?php if(isset($cnh) && $cnh->getMedicalExam()) { echo $cnh->getMedicalExam(); } ?>"
                                            required>
                                    </div>
                                    <div class="col-sm-4  mt-3">
                                        <label for="biometricUpdate" class="form-label">Atualização Biometrica:</label>
                                        <input type="date" class="form-control" id="biometricUpdate"
                                            name="biometric_update"
                                            value="<?php if(isset($cnh) && $cnh->getBiometricUpdate()) { echo $cnh->getBiometricUpdate(); } ?>"
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