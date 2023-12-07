<!DOCTYPE html>
<html lang="en">
<link href="css/consult.css" rel="stylesheet">
<?php
include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
include_once('./conexao/Conexao.php');

include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');

$client = new Client();
$clientDAO = new ClientDAO();
?>
<script src="js/progressionOfChanging.js"></script>
<link rel="stylesheet" href="css/registrationProcesses.css">

<body>
    <main>
        <?php
    if (isset($_GET["al"])) {
        $idClient = $_GET["al"];


        $client = $clientDAO->findById($idClient);
    ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">

                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">ALTERAR ALUNO</h3>
                        </div>

                        <?php
                        include_once('include/progressBar.php');
                        ?>

                        <div class="card-body">



                            <form id="form1" action="controller/ClientController.php" method="POST">
                                <div class="row">

                                    <div class="col-sm-12  mt-3" hidden>
                                        <label for="id" class="form-label">Id do Aluno:</label>
                                        <input type="number" class="form-control" id="id" name="id"
                                            value="<?php if(isset($client) && $client->getIdClient()) { echo $client->getIdClient(); } ?>"
                                            readonly="readonly">
                                    </div>

                                    <div class="col-sm-12 mt-3">
                                        <label for="name" class="form-label">Nome de Aluno:</label>
                                        <input type="text" class="form-control" id="name" name="name_client"
                                            placeholder="Digite o nome"
                                            value="<?php if(isset($client) && $client->getName()) { echo $client->getName(); } ?>"
                                            required>
                                    </div>

                                    <div class="col-sm-12  mt-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="<?php if(isset($client) && $client->getEmail()) { echo $client->getEmail(); } ?>"
                                            required>
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="responsiblefeminine" class="form-label">Nome da Responsável
                                            (Feminino):</label>
                                        <input type="text" class="form-control" id="responsiblefeminine"
                                            name="responsiblefeminine" placeholder="Digite o responsavel (Feminino)"
                                            value="<?php if(isset($client) && $client->getMother()) { echo $client->getMother(); } ?>"
                                            required>
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="responsibleMale" class="form-label">Nome do Responsável
                                            (Masculino):</label>
                                        <input type="text" class="form-control" id="responsibleMale"
                                            name="responsibleMale"
                                            placeholder="Digite o nome do responsavel (Masculino)"
                                            value="<?php if(isset($client) && $client->getFather()) { echo $client->getFather(); } ?>"
                                            required>
                                    </div>

                                    <div class="col-sm-4 mt-3">
                                        <label for="rg" class="form-label">RG:</label>
                                        <input type="text" class="form-control" id="rg" name="rg"
                                            placeholder="Digite o RG" pattern="[0-9]+"
                                            title="Apenas números são permitidos"
                                            value="<?php if(isset($client) && $client->getRg()) { echo $client->getRg(); } ?>"
                                            required>
                                    </div>


                                    <div class="col-sm-4 mt-3">
                                        <label for="rgExpedition" class="form-label">RG-Expedição:</label>
                                        <input type="text" class="form-control" id="rgExpedition" name="rgExpedition"
                                            placeholder="Digite o rg-espedição"
                                            value="<?php if(isset($client) && $client->getRgExpedition()) { echo $client->getRgExpedition(); } ?>"
                                            required>
                                    </div>

                                    <div class="col-sm-4  mt-3">
                                        <label for="uf" class="form-label">UF:</label>
                                        <input type="text" class="form-control" id="uf" name="uf"
                                            placeholder="Digite o uf"
                                            value="<?php if(isset($client) && $client->getUf()) { echo $client->getUf(); } ?>"
                                            required>
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="dateOfBirth" class="form-label">Data de nascimento:</label>
                                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth"
                                            value="<?php if(isset($client) && $client->getBirthDate()) { echo $client->getBirthDate(); } ?>"
                                            required>
                                    </div>

                                    <div class="col-sm-6 mt-3">
                                        <label for="cpf" class="form-label">CPF:</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf"
                                            placeholder="Digite o CPF" pattern="[0-9]+"
                                            title="Apenas números são permitidos"
                                            value="<?php if(isset($client) && $client->getCpf()) { echo $client->getCpf(); } ?>"
                                            required>
                                    </div>


                                    <div class="col-sm-6 mt-3">
                                        <label for="renach" class="form-label">RENACH SP:</label>
                                        <input type="text" class="form-control" id="renach" name="renach"
                                            placeholder="Digite o renach sp"
                                            value="<?php if(isset($client) && $client->getRenach()) { echo $client->getRenach(); } ?>"
                                            required>
                                    </div>

                                    <!-- <div class="col-sm-4  mt-3">
                                        <label for="registrationNumber" class="form-label">Numero de registro:</label>
                                        <input type="text" class="form-control" id="registrationNumber"
                                            name="registrationNumber" placeholder="Digite o numero de registro">
                                    </div> -->

                                    <div class="col-sm-6  mt-3">
                                        <label for="naturalness" class="form-label">Naturalidade:</label>
                                        <input type="text" class="form-control" id="naturalness" name="naturalness"
                                            placeholder="Digite a naturalidade"
                                            value="<?php if(isset($client) && $client->getNaturalness()) { echo $client->getNaturalness(); } ?>"
                                            required>
                                    </div>


                                    <div class="col-sm-12 mt-3">
                                        <br><br>
                                        <label for="address" class="form-label">Endereço:</label>
                                        <input type="text" class="form-control" id="address" name="address_client"
                                            placeholder="Digite o endereço"
                                            value="<?php if(isset($client) && $client->getAddress()) { echo $client->getAddress(); } ?>"
                                            required>
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="bairro" class="form-label">Bairro:</label>
                                        <input type="text" class="form-control" id="neighborhood" name="neighborhood"
                                            placeholder="Digite o bairro"
                                            value="<?php if(isset($client) && $client->getNeighborhood()) { echo $client->getNeighborhood(); } ?>"
                                            required>
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="residentialNumber" class="form-label">Numero de residência:</label>
                                        <input type="text" class="form-control" id="residentialNumber"
                                            name="residentialNumber" placeholder="Digite o numero de rezidência"
                                            value="<?php if(isset($client) && $client->getNumber()) { echo $client->getNumber(); } ?>"
                                            required>
                                    </div>

                                    <div class="col-sm-6 mt-3">
                                        <label for="telephone" class="form-label">Telefone:</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone"
                                            placeholder="Digite o celular" pattern="[0-9]+"
                                            title="Apenas números são permitidos"
                                            value="<?php if(isset($client) && $client->getTelephone()) { echo $client->getTelephone(); } ?>"
                                            required>
                                    </div>


                                    <div class="col-sm-6 mt-3">
                                        <label for="celphone" class="form-label">Celular:</label>
                                        <input type="text" class="form-control" id="celphone" name="celphone"
                                            placeholder="Digite o telefone" pattern="[0-9]+"
                                            title="Apenas números são permitidos"
                                            value="<?php if(isset($client) && $client->getCelphone()) { echo $client->getCelphone(); } ?>"
                                            required>
                                    </div>


                                    <div class="col-sm-12 mt-3">
                                        <label for="activitylocation" class="form-label">Local de Atividade:</label>
                                        <input type="text" class="form-control" id="activitylocation"
                                            name="activitylocation" placeholder="Digite o local de atividade"
                                            value="<?php if(isset($client) && $client->getActivityLocation()) { echo $client->getActivityLocation(); } ?>"
                                            required>
                                    </div>

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
    include_once('include/studentRecordButtons.php');
    ?>

    </main>
    <br><br>
    <?php
    include_once('include/footer.php');
    include_once('include/scrollTop.php');
    ?>
</body>

</html>