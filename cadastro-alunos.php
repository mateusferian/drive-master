<!DOCTYPE html>
<html lang="en">
    
<?php
include_once('restrito.php');
include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
include_once('include/carousel.php');
include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');

$client = new Client();
$clientdao = new ClientDAO();
?>
<body>
    <div class="container">
        <p class="fs-1 text-center mt-5">Cadastro do Aluno</p>

        <div class="container">

            <form name="form1" method="POST" action="controller/ClientController.php" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-12 mt-3">
                        <label for="name" class="form-label">Nome de Aluno:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome">
                    </div>

                    <fieldset class="row mb-0 mt-0">
                        <div class="col-sm-10 mx-auto text-center">
                            <br>
                            <div class="form-check form-check-inline ml-4 mr-4">
                                <input class="form-check-input" type="radio" name="course" id="firstLicense"
                                    value="firstLicense" checked>
                                <label class="form-check-label" for="firstLicense">
                                    1 Habilitação
                                </label>
                            </div>
                            <div class="form-check form-check-inline ml-4 mr-4">
                                <input class="form-check-input" type="radio" name="course" id="categoryAddition"
                                    value="categoryAddition">
                                <label class="form-check-label" for="categoryAddition">
                                    Adição de categoria
                                </label>
                            </div>
                            <div class="form-check form-check-inline ml-4 mr-4">
                                <input class="form-check-input" type="radio" name="course" id="rehabilitation"
                                    value="rehabilitation">
                                <label class="form-check-label" for="rehabilitation">
                                    Reabilitação
                                </label>
                            </div>
                        </div>
                    </fieldset>


                    <div class="col-sm-6 mt-3">
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
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="responsiblefeminine" class="form-label">Nome da Responsável (Feminino):</label>
                        <input type="text" class="form-control" id="responsiblefeminine" name="responsiblefeminine"
                            placeholder="Digite o responsavel (Feminino)">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="responsibleMale" class="form-label">Nome do Responsável (Masculino):</label>
                        <input type="text" class="form-control" id="responsibleMale" name="responsibleMale"
                            placeholder="Digite o nome do responsavel (Masculino)">
                    </div>


                    <div class="col-sm-12 mt-3">
                        <br><br>
                        <label for="address" class="form-label">Endereço:</label>
                        <input type="text" class="form-control" id="address" name="address"
                            placeholder="Digite o endereço">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="bairro" class="form-label">Bairro:</label>
                        <input type="text" class="form-control" id="neighborhood" name="neighborhood"
                            placeholder="Digite o bairro">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="residentialNumber" class="form-label">Numero de rezidência:</label>
                        <input type="text" class="form-control" id="residentialNumber" name="residentialNumber"
                            placeholder="Digite o numero de rezidência">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="telephone" class="form-label">Celular:</label>
                        <input type="text" class="form-control" id="telephone" name="telephone"
                            placeholder="Digite o celular">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="celphone" class="form-label">telefone:</label>
                        <input type="text" class="form-control" id="celphone" name="celphone"
                            placeholder="Digite o telefone">
                    </div>

                    <div class="col-sm-12 mt-3">
                        <label for="activitylocation" class="form-label">Local de Atividade:</label>
                        <input type="text" class="form-control" id="activitylocation" name="activitylocation"
                            placeholder="Digite o local de atividade">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="dateOfMedicExam" class="form-label">Data do exame médico:</label>
                        <input type="date" class="form-control" id="dateOfMedicExam" name="dateOfMedicExam">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="biometricUpdate" class="form-label">Atualização:</label>
                        <input type="date" class="form-control" id="biometricUpdate" name="biometricUpdate">
                    </div>


                    <div class="col-md-12  mt-3">
                        <br><br>
                        <label for="profilePicture" class="form-label">Selecione a foto de perfil:</label>
                        <input type="file" class="form-control" id="profilePicture" name="profilePicture">
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label for="renach" class="form-label">RENACH SP:</label>
                        <input type="text" class="form-control" id="renach" name="renach"
                            placeholder="Digite o renach sp">
                    </div>

                    <div class="col-sm-4  mt-3">
                        <label for="rg" class="form-label">RG:</label>
                        <input type="text" class="form-control" id="rg" name="rg" placeholder="Digite o rg">
                    </div>

                    <div class="col-sm-4  mt-3">
                        <label for="uf" class="form-label">UF:</label>
                        <input type="text" class="form-control" id="uf" name="uf" placeholder="Digite o uf">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="dateOfBirth" class="form-label">Data de nascimento:</label>
                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="cpf" class="form-label">CPF:</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o cpf">
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label for="rgExpedition" class="form-label">RG-Espedição:</label>
                        <input type="text" class="form-control" id="rgExpedition" name="rgExpedition"
                            placeholder="Digite o rg-espedição">
                    </div>

                    <div class="col-sm-4  mt-3">
                        <label for="registrationNumber" class="form-label">Numero de registro:</label>
                        <input type="text" class="form-control" id="registrationNumber" name="registrationNumber"
                            placeholder="Digite o numero de registro">
                    </div>

                    <div class="col-sm-4  mt-3">
                        <label for="naturalness" class="form-label">Naturalidade:</label>
                        <input type="text" class="form-control" id="naturalness" name="naturalness"
                            placeholder="Digite a naturalidade">
                    </div>

                    <p class="fs-1 text-center mt-5"> Fomas de Pagamento</p>


                    <div class="col-sm-10 mx-auto text-center">
                        <br>
                        <div class="form-check form-check-inline ml-4 mr-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckCash"
                                    name="installmentType" data-target="advancePayment">
                                <label class="form-check-label" for="flexCheckCash">Modo a vista:</label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline ml-4 mr-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="installment"
                                    name="installmentType" data-target="firstPaymentInstallment">
                                <label class="form-check-label" for="installment">Parcelamento</label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline ml-4 mr-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckCourse"
                                    name="installmentType" data-target="secondPaymentInstallment">
                                <label class="form-check-label" for="flexCheckCourse">Curso a vista:</label>
                            </div>
                        </div>
                    </div>




                    <div class="col-sm-12 mt-3" id="advancePayment" style="display: none;">
                        <table class="table">
                            <tr>
                                <td>Pagamento Avista:</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="ValueOfFirstInstallment"
                                        name="ValueOfFirstInstallment" step="0.01" placeholder="Digite o valor avista">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="dateOfFirstInstallment"
                                        name="dateOfFirstInstallment">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select id="installmentMode" name="installmentMode" class="form-select">
                                        <option selected>forma de pagamento dessa parcela</option>
                                        <option>Parcelado no cartão</option>
                                        <option>Parcelado no carnê</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>


                    <div class="col-sm-12  mt-3 " id="paymentDueDate" style="display: none;">
                        <label for="paymentDueDate" class="form-label">Vencimento de pagamento:</label>
                        <input type="date" class="form-control" id="paymentDueDate" name="paymentDueDate"
                            placeholder="Digite o vencimento de pagamento">
                    </div>

                    <div class="col-sm-6 mt-3" id="firstPaymentInstallment" style="display: none;">
                        <table class="table">
                            <tr>
                                <td>1º Parcela:</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="valueOfFirstInstallment"
                                        name="valueOfFirstInstallment" step="0.01"
                                        placeholder="Digite o valor da primeira parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="dateOfFirstInstallment"
                                        name="dateOfFirstInstallment">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <select id="installmentMode" name="installmentMode" class="form-select">
                                        <option selected>forma de pagamento dessa parcela</option>
                                        <option>Parcelado no cartão</option>
                                        <option>Parcelado no carnê</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <select id="paymentStatus" name="paymentStatus" class="form-select">
                                        <option selected>Situação de pagamento</option>
                                        <option>Pagamento realizado</option>
                                        <option>Em aberto</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6 mt-3" id="secondPaymentInstallment" style="display: none;">
                        <table class="table">
                            <tr>
                                <td>2º Parcela:</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="valueOfSecondInstallment"
                                        name="valueOfSecondInstallment" step="0.01"
                                        placeholder="Digite o valor da segunda parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="dateOfSecondInstallment"
                                        name="dateOfSecondInstallment">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select id="installmentMode" name="installmentMode" class="form-select">
                                        <option selected>forma de pagamento dessa parcela</option>
                                        <option>Parcelado no cartão</option>
                                        <option>Parcelado no carnê</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select id="paymentStatus" name="paymentStatus" class="form-select">
                                        <option selected>Situação de pagamento</option>
                                        <option>Pagamento realizado</option>
                                        <option>Em aberto</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6 mt-3" id="thirdPaymentInstallment" style="display: none;">
                        <table class="table">
                            <tr>
                                <td>3º Parcela:</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="valueOfThirdInstallment"
                                        name="valueOfThirdInstallment" step="0.01"
                                        placeholder="Digite o valor da terceira parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="dateOfThirdInstallment"
                                        name="dateOfThirdInstallment">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select id="installmentMode" name="installmentMode" class="form-select">
                                        <option selected>forma de pagamento dessa parcela</option>
                                        <option>Parcelado no cartão</option>
                                        <option>Parcelado no carnê</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select id="paymentStatus" name="paymentStatus" class="form-select">
                                        <option selected>Situação de pagamento</option>
                                        <option>Pagamento realizado</option>
                                        <option>Em aberto</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6 mt-3" id="fourthPaymentInstallment" style="display: none;">
                        <table class="table">
                            <tr>
                                <td>4º Parcela:</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="valueOfFourthInstallment"
                                        name="valueOfFourthInstallment" step="0.01"
                                        placeholder="Digite o valor da quarta parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="dateOfFourthInstallment"
                                        name="dateOfFourthInstallment">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select id="installmentMode" name="installmentMode" class="form-select">
                                        <option selected>forma de pagamento dessa parcela</option>
                                        <option>Parcelado no cartão</option>
                                        <option>Parcelado no carnê</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select id="paymentStatus" name="paymentStatus" class="form-select">
                                        <option selected>Situação de pagamento</option>
                                        <option>Pagamento realizado</option>
                                        <option>Em aberto</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6 mt-3" id="fifthPaymentInstallment" style="display: none;">
                        <table class="table">
                            <tr>
                                <td>5º Parcela:</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="valueOfFifthInstallment"
                                        name="valueOfFifthInstallment" step="0.01"
                                        placeholder="Digite o valor da quinta parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="dateOfFifthInstallment"
                                        name="dateOfFifthInstallment">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select id="installmentMode" name="installmentMode" class="form-select">
                                        <option selected>forma de pagamento dessa parcela</option>
                                        <option>Parcelado no cartão</option>
                                        <option>Parcelado no carnê</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select id="paymentStatus" name="paymentStatus" class="form-select">
                                        <option selected>Situação de pagamento</option>
                                        <option>Pagamento realizado</option>
                                        <option>Em aberto</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6 mt-3" id="sixthPaymentInstallment" style="display: none;">
                        <table class="table">
                            <tr>
                                <td>6º Parcela:</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="valueOfSixthInstallment"
                                        name="valueOfSixthInstallment" step="0.01"
                                        placeholder="Digite o valor da sexta parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="dateOfSixthInstallment"
                                        name="dateOfSixthInstallment">
                                </td>
                            </tr>
                            <td>
                                <select id="installmentMode" name="installmentMode" class="form-select">
                                    <option selected>Informe qual a forma de pagamento dessa parcela</option>
                                    <option>Parcelado no cartão</option>
                                    <option>Parcelado no carnê</option>
                                </select>

                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <select id="paymentStatus" name="paymentStatus" class="form-select">
                                        <option selected>Situação de pagamento</option>
                                        <option>Pagamento realizado</option>
                                        <option>Em aberto</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>


                    <script src="js/installment.js"></script>




                    <p class="fs-1 text-center mt-5">Datas de Exames</p>

                    <div class="col-sm-3 mt-3">
                        <label for="theoretical" class="form-label">Teórico:</label>
                        <input type="date" class="form-control" id="theoretical" name="theoretical">
                    </div>

                    <div class="col-sm-3 mt-3">
                        <label for="practiceCar" class="form-label">Pratico de Carro:</label>
                        <input type="date" class="form-control" id="practiceCar" name="practiceCar">
                    </div>

                    <div class="col-sm-3  mt-3">
                        <label for="practicalMotorcycle" class="form-label">Pratico de Moto:</label>
                        <input type="date" class="form-control" id="practicalMotorcycle" name="practicalMotorcycle">
                    </div>

                    <div class="col-sm-3  mt-3">
                        <label for="cnh" class="form-label"> emissão CNH:</label>
                        <input type="date" class="form-control" id="cnh" name="cnh">
                    </div>

                    <div class="col-sm-3  mt-3">
                        <label for="disapprove" class="form-label">Reprova:</label>
                        <input type="date" class="form-control" id="disapprove" name="disapprove">
                    </div>

                    <div class="col-sm-3  mt-3">
                        <label for="dateExameA" class="form-label">Data Exame A:</label>
                        <input type="date" class="form-control" id="dateExameA" name="dateExameA">
                    </div>

                    <div class="col-sm-3  mt-3">
                        <label for="dateExameB" class="form-label">Data Exame B:</label>
                        <input type="date" class="form-control" id="dateExameB" name="dateExameB">
                    </div>

                    <div class="col-sm-3  mt-3">
                        <label for="dateExameD" class="form-label">Data Exame D:</label>
                        <input type="date" class="form-control" id="dateExameD" name="dateExameD">
                    </div> <br><br>
                    <div class="col-12 mt-3">
                    <button type="submit" name="register" class="btn customButton">Avançar</button>
                </div>

                </div>
            </form>
        </div>
    </div>

    <br><br>
    <?php
include_once('include/footer.php');
include_once('include/scrollTop.php');
?>
</body>

</html>