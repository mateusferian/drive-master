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
include_once('./model/CourseOnSight.php');
include_once('./dao/CourseOnSightDAO.php');
include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');

$client = new Client();
$clientdao = new ClientDAO();

$courseOnSight = new CourseOnSight();
$courseOnSightDAO = new CourseOnSightDAO();
?>
<link rel="stylesheet" href="css/registrationProcesses.css">

<body>
    <main>
    <?php
    if (isset($_GET["al"])) {
        $idClient = $_GET["al"];

        $courseOnSight = $courseOnSightDAO->findByClientId($idClient);

        if ($courseOnSight) {
    ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">

                        <div class="card-header">
                            <h4 class="text-center font-weight-light my-4">
                            <span class="h3">Alterar Aluno</span>
                                <small class="d-block">Dados de curso a vista</small>
                            </h4>
                        </div>

                        <?php
                            include_once('include/teste.php');
                        ?>
                        <script src="js/displayPaymentUpdate.js"></script>


                        <div class="card-body">
                            <form id="form4" action="controller/CourseOnSightController.php" method="POST">
                            <div class="col-sm-12  mt-3" hidden>
                                    <label for="idcourseOnSight" class="form-label">Id do Curso:</label>
                                    <input type="text" class="form-control" id="idcourseOnSight" name="idcourseOnSight"
                                        value="<?php if(isset($courseOnSight) && $courseOnSight->getidCourseOnSight()) { echo $courseOnSight->getidCourseOnSight(); } ?>"
                                        readonly="readonly">
                                </div>

                                <div class="col-sm-12  mt-3" hidden>
                                                <label for="idclient" class="form-label">Id Aluno:</label>
                                                <input type="text" class="form-control" id="idclient" name="idclient"
                                                    value="<?php if(isset($courseOnSight) && $courseOnSight->getIdClient()) { echo $courseOnSight->getIdClient(); } ?>"
                                                    readonly="readonly">
                                            </div>
                                <div class="row">

                                    <div class="col-sm-12 mt-3">
                                        <table class="table">
                                            <tr>
                                                <td>Curso a vista:</td>
                                            </tr>
                                            <tr>
                                            <td>
                                                <input type="text" class="form-control" id="value_course_on_sight" name="value_course_on_sight" 
                                                    step="0.01" placeholder="Digite o valor à vista" 
                                                    pattern="^\d{1,}(\.\d{1,2})?$|^(\d{1,3}(,\d{3})*(\.\d{1,2})?)?$" title="Por favor, insira um valor válido. Exemplo: 1.000,00"
                                                    value="<?php if(isset($courseOnSight) && $courseOnSight->getValueCourseOnSight()) { echo $courseOnSight->getValueCourseOnSight(); } ?>" required>
                                            </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="date" class="form-control" id="date_course_on_sight"
                                                        name="date_course_on_sight"
                                                        value="<?php if(isset($courseOnSight) && $courseOnSight->getDateCourseOnSight()) { echo $courseOnSight->getDateCourseOnSight(); } ?>" required>
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