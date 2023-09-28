<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lider cadastro de aluno</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link href="css/studentRegistration.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top customNavbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="image/logo.png" alt="ETEC Games"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Controle de aluno</a>
                    <a class="nav-link" href="cadastroDeAluno.php">Cadastro de aluno</a>
                    <a class="nav-link" href="cadastroAulaExtra.php">Cadastro de aula extra</a>
                    <a class="nav-link" href="#contato">Ajuda</a>
                </div>
            </div>
        </div>
    </nav>

    <?php
    $folderImages = 'carouselImage/';
    $extensoesPermitidas = array('jpg', 'jpeg', 'png');
    $image = array();

    if (is_dir($folderImages)) {
        $files = glob($folderImages . '*.{jpg,jpeg,png}', GLOB_BRACE);
        shuffle($files);
        $image = array_map(function($file) use ($folderImages) {
            return str_replace($folderImages, '', $file);
        }, $files);
    }
    ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php foreach ($image as $index => $imagem) : ?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $index; ?>"
                <?= $index === 0 ? 'class="active"' : '' ?> aria-label="Slide <?= ($index + 1); ?>"></button>
            <?php endforeach; ?>
        </div>
        <div class="carousel-inner">
            <?php foreach ($image as $index => $imagem) : ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <img src="<?= $folderImages . $imagem; ?>" class="d-block w-100 imagem-carrossel"
                    alt="banner <?= ($index + 1); ?>">
            </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Inclua o jQuery e os files JavaScript do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        // Intervalo para trocar automaticamente as image a cada 3 segundos (3000 ms)
        setInterval(function() {
            $('#carouselExampleIndicators').carousel('next');
        }, 9000);
    });
    </script>

    <div class="container">
        <p class="fs-1 text-center mt-5">Cadastro do Aluno</p>

        <div class="container">

            <form name="form1" method="post" action="studentRegistration.php" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-12 mt-3">
                        <label for="name" class="form-label">Nome do Aluno:</label>
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
                        <input type="text" class="form-control" id="responsiblefeminine" name="responsiblefeminine" placeholder="Digite o responsavel (Feminino)">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="responsibleMale" class="form-label">Nome do Responsável (Masculino):</label>
                        <input type="text" class="form-control" id="responsibleMale" name="responsibleMale" placeholder="Digite o nome do responsavel (Masculino)">
                    </div>


                    <div class="col-sm-12 mt-3">
                        <br><br>
                        <label for="address" class="form-label">Endereço:</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Digite o endereço">
                    </div>

                    <div class="col-sm-4  mt-3">
                        <label for="bairro" class="form-label">Bairro:</label>
                        <input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="Digite o bairro">
                    </div>

                    <div class="col-sm-4  mt-3">
                        <label for="residentialNumber" class="form-label">Numero de rezidência:</label>
                        <input type="text" class="form-control" id="residentialNumber" name="residentialNumber" placeholder="Digite o numero de rezidência">
                    </div>

                    <div class="col-sm-4  mt-3">
                        <label for="telephone" class="form-label">telefone:</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Digite o telefone">
                    </div>

                    <div class="col-sm-12 mt-3">
                        <label for="activitylocation" class="form-label">Local de Atividade:</label>
                        <input type="text" class="form-control" id="activitylocation" name="activitylocation" placeholder="Digite o local de atividade">
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
                        <input type="text" class="form-control" id="renach" name="renach" placeholder="Digite o renach sp">
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
                        <input type="text" class="form-control" id="rgExpedition" name="rgExpedition" placeholder="Digite o rg-espedição">
                    </div>

                    <div class="col-sm-4  mt-3">
                        <label for="registrationNumber" class="form-label">Numero de registro:</label>
                        <input type="text" class="form-control" id="registrationNumber" name="registrationNumber" placeholder="Digite o numero de registro">
                    </div>

                    <div class="col-sm-4  mt-3">
                        <label for="naturalness" class="form-label">Naturalidade:</label>
                        <input type="text" class="form-control" id="naturalness" name="naturalness" placeholder="Digite a naturalidade">
                    </div>

                    <p class="fs-1 text-center mt-5">Pagamento</p>


                    <div class="col-md-3 mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCash"
                                name="installmentType">
                            <label class="form-check-label" for="flexCheckCash">A vista:</label>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCarnet"
                                name="installmentType">
                            <label class="form-check-label" for="flexCheckCarnet">Parcelado no carnê:</label>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCard"
                                name="installmentType">
                            <label class="form-check-label" for="flexCheckCard">Parcelado no cartão:</label>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCourse"
                                name="installmentType">
                            <label class="form-check-label" for="flexCheckCourse">Curso a vista:</label>
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
                                        name="ValueOfFirstInstallment" step="0.01"
                                        placeholder="Digite o valor avista">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="DateOfFirstInstallment"
                                        name="DateOfFirstInstallment">
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6 mt-3" id="firstPaymentInstallment" style="display: none;">
                        <table class="table">
                            <tr>
                                <td>1º Parcela:</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="ValueOfFirstInstallment"
                                        name="ValueOfFirstInstallment" step="0.01"
                                        placeholder="Digite o valor da primeira parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="DateOfFirstInstallment"
                                        name="DateOfFirstInstallment">
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
                                    <input type="text" class="form-control" id="ValueOfSecondInstallment"
                                        name="ValueOfSecondInstallment" step="0.01"
                                        placeholder="Digite o valor da segunda parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="DateOfSecondInstallment"
                                        name="DateOfSecondInstallment">
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
                                    <input type="text" class="form-control" id="ValueOfThirdInstallment"
                                        name="ValueOfThirdInstallment" step="0.01"
                                        placeholder="Digite o valor da terceira parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="DateOfThirdInstallment"
                                        name="DateOfThirdInstallment">
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
                                    <input type="text" class="form-control" id="ValueOfFourthInstallment"
                                        name="ValueOfFourthInstallment" step="0.01"
                                        placeholder="Digite o valor da quarta parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="DateOfFourthInstallment"
                                        name="DateOfFourthInstallment">
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
                                    <input type="text" class="form-control" id="ValueOfFifthInstallment"
                                        name="ValueOfFifthInstallment" step="0.01"
                                        placeholder="Digite o valor da quinta parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="DateOfFifthInstallment"
                                        name="DateOfFifthInstallment">
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
                                    <input type="text" class="form-control" id="ValueOfSixthInstallment"
                                        name="ValueOfSixthInstallment" step="0.01"
                                        placeholder="Digite o valor da sexta parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="DateOfSixthInstallment"
                                        name="DateOfSixthInstallment">
                                </td>
                            </tr>
                        </table>
                    </div>


                    <script src="js/installmentPayment.js"></script>





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
                        <label for="reprova" class="form-label">Reprova:</label>
                        <input type="date" class="form-control" id="reprova" name="reprova">
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
                    </div>
                    <div class="col-12 mt-3">
                        <button type="date" name="cadastrar" class="btn customButton">Cadastrar</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <br><br>
    <footer id="footer" class="customFooter">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span>Impact</span>
                    </a>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                        valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>
                        A108 Adam Street <br>
                        New York, NY 535022<br>
                        United States <br><br>
                        <strong>Phone:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>

                </div>

            </div>
        </div>

        <div class="container mt-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Impact</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>
</body>

</html>