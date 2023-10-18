<!DOCTYPE html>
<html lang="en">
<?php
include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
include_once('./conexao/Conexao.php');
include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');
include_once('./model/Cnh.php');
include_once('./dao/CnhDAO.php');
include_once('./model/Rates.php');
include_once('./dao/RatesDAO.php');

$client = new Client();
$clientDAO = new ClientDAO();

$cnh = new Cnh();
$cnhDAO = new CnhDAO();

$rates = new Rates();
$ratesDAO = new RatesDAO();
?>

<body>
    <main>
        <?php
    if (isset($_GET["consult"])) {
        $idClient = $_GET["consult"];

        $client = $clientDAO->findById($idClient);

        $cnh = $cnhDAO->findByClientId($idClient);
        $rates = $ratesDAO->findByClientId($idClient);

        if ($client) {
    ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">

                        <div class="card-header">
                            <h4 class="text-center font-weight-light my-4">
                                <span class="h3"><?php echo strtoupper($client->getName()); ?></span>
                                <small class="d-block">Dados do aluno</small>
                            </h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="name" class="form-label">Nome de Aluno:</label>
                                    <p class='form-control'><?php echo $client->getName(); ?></p>
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <label for="name" class="form-label">Email::</label>
                                    <p class='form-control'><?php echo $client->getEmail(); ?></p>
                                </div>

                                <div class="col-sm-6  mt-3">
                                    <label for="responsiblefeminine" class="form-label">Nome da Responsável
                                        (Feminino):</label>
                                    <p class='form-control'><?php echo $client->getMother(); ?></p>
                                </div>

                                <div class="col-sm-6  mt-3">
                                    <label for="responsibleMale" class="form-label">Nome do Responsável
                                        (Masculino):</label>
                                    <p class='form-control'><?php echo $client->getFather(); ?></p>
                                </div>

                                <div class="col-sm-6  mt-3">
                                    <label for="rg" class="form-label">RG:</label>
                                    <p class='form-control'><?php echo $client->getRg(); ?></p>
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <label for="rgExpedition" class="form-label">RG-Expedição:</label>
                                    <p class='form-control'><?php echo $client->getRgExpedition(); ?></p>
                                </div>

                                <div class="col-sm-6  mt-3">
                                    <label for="uf" class="form-label">UF:</label>
                                    <p class='form-control'><?php echo $client->getUf(); ?></p>
                                </div>

                                <div class="col-sm-6  mt-3">
                                    <label for="dateOfBirth" class="form-label">Data de nascimento:</label>
                                    <p class='form-control'><?php echo $client->getBirthDate(); ?></p>
                                </div>

                                <div class="col-sm-6  mt-3">
                                    <label for="cpf" class="form-label">CPF:</label>
                                    <p class='form-control'><?php echo $client->getCpf(); ?></p>
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <label for="renach" class="form-label">RENACH SP:</label>
                                    <p class='form-control'><?php echo $client->getRenach(); ?></p>
                                </div>

                                <!-- <div class="col-sm-4  mt-3">
                                        <label for="registrationNumber" class="form-label">Numero de registro:</label>
                                        <input type="text" class="form-control" id="registrationNumber"
                                            name="registrationNumber" placeholder="Digite o numero de registro">
                                    </div> -->

                                <div class="col-sm-6  mt-3">
                                    <label for="naturalness" class="form-label">Naturalidade:</label>
                                    <p class='form-control'><?php echo $client->getNaturalness(); ?></p>
                                </div>


                                <div class="col-sm-12 mt-3">
                                    <label for="address" class="form-label">Endereço:</label>
                                    <p class='form-control'><?php echo $client->getAddress(); ?></p>
                                </div>

                                <div class="col-sm-6  mt-3">
                                    <label for="bairro" class="form-label">Bairro:</label>
                                    <p class='form-control'><?php echo $client->getNeighborhood(); ?></p>
                                </div>

                                <div class="col-sm-6  mt-3">
                                    <label for="residentialNumber" class="form-label">Numero de residência:</label>
                                    <p class='form-control'><?php echo $client->getNumber(); ?></p>
                                </div>

                                <div class="col-sm-4  mt-3">
                                    <label for="telephone" class="form-label">Celular:</label>
                                    <p class='form-control'><?php echo $client->getCelphone(); ?></p>
                                </div>

                                <div class="col-sm-4  mt-3">
                                    <label for="celphone" class="form-label">Telefone:</label>
                                    <p class='form-control'><?php echo $client->getTelephone(); ?></p>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <label for="activitylocation" class="form-label">Local de Atividade:</label>
                                    <p class='form-control'><?php echo $client->getActivityLocation(); ?></p>
                                </div>



                                <div class="col-sm-12 mt-3">
                                    <label for="activitylocation" class="form-label">Curso:</label>
                                    <p class='form-control'><?php echo $cnh->getCategory(); ?></p>
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <label for="activitylocation" class="form-label">Categoria:</label>
                                    <p class='form-control'><?php echo $cnh->getType(); ?></p>
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <label for="activitylocation" class="form-label">Data do exame médico:</label>
                                    <p class='form-control'><?php echo $cnh->getMedicalExam(); ?></p>
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <label for="activitylocation" class="form-label">Numero de registro:</label>
                                    <p class='form-control'><?php echo $cnh->getRegistrationNumber(); ?></p>
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <label for="activitylocation" class="form-label">Atualização Biometrica:</label>
                                    <p class='form-control'><?php echo $cnh->getBiometricUpdate(); ?></p>
                                </div>



                                <div class="col-sm-12 mt-3">
                                    <label for="theoretical" class="form-label">Teórico:</label>
                                    <p class='form-control'><?php echo $rates->getTheoretic(); ?></p>
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <label for="practiceCar" class="form-label">Pratico de Carro:</label>
                                    <p class='form-control'><?php echo $rates->getPractice1(); ?></p>
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <label for="practicalMotorcycle" class="form-label">Pratico de Moto:</label>
                                    <p class='form-control'><?php echo $rates->getPractice2(); ?></p>
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <label for="cnh" class="form-label"> emissão CNH:</label>
                                    <p class='form-control'><?php echo $rates->getEmissionCnh(); ?></p>
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <label for="disapprove" class="form-label">Reprova:</label>
                                    <p class='form-control'><?php echo $rates->getDisapprove(); ?></p>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <label for="dateExameA" class="form-label">Data Exame A:</label>
                                    <p class='form-control'><?php echo $rates->getExamA(); ?></p>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <label for="dateExameB" class="form-label">Data Exame B:</label>
                                    <p class='form-control'><?php echo $rates->getExamB(); ?></p>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <label for="dateExameD" class="form-label">Data Exame D:</label>
                                    <p class='form-control'><?php echo $rates->getExamD(); ?></p>
                                </div>

                                <div class="row justify-content-center mt-8 text-center">
                                    <div class="col-4">
                                    <br><br>
                                        <button type="button" name="voltar" class="btn customButton"
                                            onclick="window.location.href = 'controle-de-aluno.php';">Voltar para
                                            controle de aluno</button>
                                            <br><br>
                                    </div>

                                    <div class="col-4">
                                    <br><br>
                                        <button type="button" name="voltar" class="btn customButton"
                                            onclick="window.location.href = 'seu_pdf.pdf';">Baixar PDF dos dados do
                                            aluno</button>
                                            <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center py-3"></div>
                </div>
            </div>
        </div>
        <?php
        } else {
            echo "Cliente não encontrado";
        }
    }
    ?>
    </main>
    <br><br>
    <?php
    include_once('include/footer.php');
    include_once('include/scrollTop.php');
    ?>
</body>

</html>