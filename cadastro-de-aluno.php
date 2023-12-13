<!DOCTYPE html>
<html lang="en">
<script src="js/progressBar.js"></script>
<?php
include_once('restrito.php');
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



                            <form id="form1" action="controller/ClientController.php" method="POST">
                                <div class="row">
                                    <div class="col-sm-12 mt-3">
                                        <label for="name" class="form-label">Nome de Aluno:</label>
                                        <input type="text" class="form-control" id="name" name="name_client"
                                            placeholder="Digite o nome" required>
                                    </div>

                                    <div class="col-sm-12  mt-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Digite o email" required>
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="responsiblefeminine" class="form-label">Nome da Responsável
                                            (Feminino):</label>
                                        <input type="text" class="form-control" id="responsiblefeminine"
                                            name="responsiblefeminine" placeholder="Digite o responsavel (Feminino)"
                                            required>
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="responsibleMale" class="form-label">Nome do Responsável
                                            (Masculino):</label>
                                        <input type="text" class="form-control" id="responsibleMale"
                                            name="responsibleMale"
                                            placeholder="Digite o nome do responsavel (Masculino)" required>
                                    </div>

                                    <div class="col-sm-4 mt-3">
                                        <label for="rg" class="form-label">RG:</label>
                                        <input type="text" class="form-control" id="rg" name="rg"
                                            placeholder="Digite o RG" pattern="[0-9]+"
                                            title="Apenas números são permitidos" required>
                                    </div>


                                    <div class="col-sm-4 mt-3">
                                        <label for="rgExpedition" class="form-label">RG-Expedição:</label>
                                        <input type="text" class="form-control" id="rgExpedition" name="rgExpedition"
                                            placeholder="Digite o rg-espedição" required>
                                    </div>

                                    <div class="col-sm-4  mt-3">
                                        <label for="uf" class="form-label">UF:</label>
                                        <input type="text" class="form-control" id="uf" name="uf"
                                            placeholder="Digite o uf" required>
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="dateOfBirth" class="form-label">Data de nascimento:</label>
                                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth"
                                            required>
                                    </div>

                                    <div class="col-sm-6 mt-3">
                                        <label for="cpf" class="form-label">CPF:</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf"
                                            placeholder="Digite o CPF" pattern="[0-9]+"
                                            title="Apenas números são permitidos" required>
                                    </div>


                                    <div class="col-sm-4 mt-3">
                                        <label for="renach" class="form-label">RENACH SP:</label>
                                        <input type="text" class="form-control" id="renach" name="renach"
                                            placeholder="Digite o renach sp" required>
                                    </div>

                                    <div class="col-sm-4  mt-3">
                                        <label for="naturalness" class="form-label">Naturalidade:</label>
                                        <input type="text" class="form-control" id="naturalness" name="naturalness"
                                            placeholder="Digite a naturalidade" required>
                                    </div>


                                    <div class="col-sm-12 mt-3">
                                        <br><br>
                                        <label for="address" class="form-label">Endereço:</label>
                                        <input type="text" class="form-control" id="address" name="address_client"
                                            placeholder="Digite o endereço" required>
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="bairro" class="form-label">Bairro:</label>
                                        <input type="text" class="form-control" id="neighborhood" name="neighborhood"
                                            placeholder="Digite o bairro" required>
                                    </div>

                                    <div class="col-sm-6  mt-3">
                                        <label for="residentialNumber" class="form-label">Numero de residência:</label>
                                        <input type="text" class="form-control" id="residentialNumber"
                                            name="residentialNumber" placeholder="Digite o numero de rezidência"
                                            required>
                                    </div>

                                    <div class="col-sm-6 mt-3">
                                        <label for="telephone" class="form-label">Celular:</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone"
                                            placeholder="Digite o celular" pattern="[0-9]+"
                                            title="Apenas números são permitidos" required>
                                    </div>


                                    <div class="col-sm-6 mt-3">
                                        <label for="celphone" class="form-label">Telefone:</label>
                                        <input type="text" class="form-control" id="celphone" name="celphone"
                                            placeholder="Digite o telefone" pattern="[0-9]+"
                                            title="Apenas números são permitidos" required>
                                    </div>


                                    <div class="col-sm-12 mt-3">
                                        <label for="activitylocation" class="form-label">Local de Atividade:</label>
                                        <input type="text" class="form-control" id="activitylocation"
                                            name="activitylocation" placeholder="Digite o local de atividade" required>
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