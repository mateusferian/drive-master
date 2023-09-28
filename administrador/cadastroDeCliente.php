<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lider cadastro de aluno</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link href="css/cadastro.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="imagens/logo.png" alt="ETEC Games"></a>
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
    $pastaImagens = 'imagensDoSite/';
    $extensoesPermitidas = array('jpg', 'jpeg', 'png', 'gif');
    $imagens = array();

    if (is_dir($pastaImagens)) {
        $arquivos = glob($pastaImagens . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        shuffle($arquivos);
        $imagens = array_map(function($arquivo) use ($pastaImagens) {
            return str_replace($pastaImagens, '', $arquivo);
        }, $arquivos);
    }
    ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php foreach ($imagens as $index => $imagem) : ?>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $index; ?>"
                    <?= $index === 0 ? 'class="active"' : '' ?> aria-label="Slide <?= ($index + 1); ?>"></button>
            <?php endforeach; ?>
        </div>
        <div class="carousel-inner">
            <?php foreach ($imagens as $index => $imagem) : ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <img src="<?= $pastaImagens . $imagem; ?>" class="d-block w-100 imagem-carrossel" alt="banner <?= ($index + 1); ?>">
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

    <!-- Inclua o jQuery e os arquivos JavaScript do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            // Intervalo para trocar automaticamente as imagens a cada 3 segundos (3000 ms)
            setInterval(function () {
                $('#carouselExampleIndicators').carousel('next');
            }, 9000);
        });
    </script>

    <div class="container">
        <p class="fs-1 text-center mt-5">Cadastro do Aluno</p>

        <div class="container">

            <form name="form1" method="post" action="adm2.php" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-12 mt-3">
                        <label for="nome" class="form-label">Nome do Aluno:</label>
                        <input type="text" class="form-control" id="nome" name="nome">
                    </div>

                    <fieldset class="row mb-0 mt-0">
                        <div class="col-sm-10 mx-auto text-center">
                            <br>
                            <div class="form-check form-check-inline ml-4 mr-4">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                    value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    1 Habilitação
                                </label>
                            </div>
                            <div class="form-check form-check-inline ml-4 mr-4">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2"
                                    value="option2">
                                <label class="form-check-label" for="gridRadios2">
                                    Adição de categoria
                                </label>
                            </div>
                            <div class="form-check form-check-inline ml-4 mr-4">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3"
                                    value="option3">
                                <label class="form-check-label" for="gridRadios3">
                                    Reabilitação
                                </label>
                            </div>
                        </div>
                    </fieldset>


                    <div class="col-sm-6 mt-3">
                        <label for="categoria" class="form-label">Categoria</label>
                        <select id="categoria" name="categoria" class="form-select">
                            <option selected>Informe qual categoria o aluno irá fazer</option>
                            <option>A</option>
                            <option>B</option>
                            <option>AB</option>
                            <option>C</option>
                        </select>
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="responsavelfeminino" class="form-label">Nome da Responsável (Feminino):</label>
                        <input type="text" class="form-control" id="responsavelfeminino" name="responsavelfeminino">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="responsavelMasculino" class="form-label">Nome do Responsável (Masculino):</label>
                        <input type="text" class="form-control" id="responsavelMasculino" name="responsavelMasculino">
                    </div>


                    <div class="col-sm-12 mt-3">
                        <br><br>
                        <label for="endereco" class="form-label">Endereço:</label>
                        <input type="text" class="form-control" id="endereco" name="endereco">
                    </div>

                    <div class="col-sm-4  mt-3">
                        <label for="bairro" class="form-label">Bairro:</label>
                        <input type="text" class="form-control" id="bairro" name="bairro">
                    </div>

                    <div class="col-sm-4  mt-3">
                        <label for="numeroDeRezidencia" class="form-label">Numero de rezidência:</label>
                        <input type="text" class="form-control" id="numeroDeRezidencia" name="numeroDeRezidencia">
                    </div>

                    <div class="col-sm-4  mt-3">
                        <label for="telefone" class="form-label">telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone">
                    </div>

                    <div class="col-sm-12 mt-3">
                        <label for="localDeAtividade" class="form-label">Local de Atividade:</label>
                        <input type="text" class="form-control" id="localDeAtividade" name="localDeAtividade">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="dataDoExameMedico" class="form-label">Data do exame médico:</label>
                        <input type="text" class="form-control" id="dataDoExameMedico" name="dataDoExameMedico">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="atualizacaoBiometrica" class="form-label">Atualização:</label>
                        <input type="text" class="form-control" id="atualizacaoBiometrica" name="atualizacaoBiometrica">
                    </div>


                    <div class="col-md-12  mt-3">
                        <br><br>
                        <label for="fotoDePerfil" class="form-label">Selecione a foto de perfil:</label>
                        <input type="file" class="form-control" id="fotoDePerfil" name="fotoDePerfil">
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label for="renach" class="form-label">RENACH SP:</label>
                        <input type="text" class="form-control" id="renach" name="renach">
                    </div>

                    <div class="col-sm-4  mt-3">
                        <label for="rg" class="form-label">RG:</label>
                        <input type="text" class="form-control" id="rg" name="rg">
                    </div>

                    <div class="col-sm-4  mt-3">
                        <label for="uf" class="form-label">UF:</label>
                        <input type="text" class="form-control" id="responsavelMasufculino" name="uf">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="dataDeNascimento" class="form-label">Data de nascimento:</label>
                        <input type="text" class="form-control" id="dataDeNascimento" name="dataDeNascimento">
                    </div>

                    <div class="col-sm-6  mt-3">
                        <label for="cpf" class="form-label">CPF:</label>
                        <input type="text" class="form-control" id="cpf" name="cpf">
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label for="rgEspedicao" class="form-label">RG-Espedição:</label>
                        <input type="text" class="form-control" id="rgEspedicao" name="rgEspedicao">
                    </div>

                    <div class="col-sm-4  mt-3">
                        <label for="numeroDeRegistro" class="form-label">Numero de registro:</label>
                        <input type="text" class="form-control" id="numeroDeRegistro" name="numeroDeRegistro">
                    </div>

                    <div class="col-sm-4  mt-3">
                        <label for="naturalidade" class="form-label">Naturalidade:</label>
                        <input type="text" class="form-control" id="naturalidade" name="naturalidade">
                    </div>

                    <p class="fs-1 text-center mt-5">Pagamento</p>

                        <div class="col-sm-6  mt-3">
                        <label for="vista" class="form-label">A vista:</label>
                        <input type="text" class="form-control" id="vista" name="vista">
                    </div>


                    <div class="col-sm-6 mt-3">
                        <label for="parceladoNoCarne" class="form-label">Parcelado no carnê:</label>
                        <input type="text" class="form-control" id="parceladoNoCarne" name="parceladoNoCarne">
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label for="parceladoNoCartao" class="form-label">Parcelado no cartão:</label>
                        <input type="text" class="form-control" id="parceladoNoCartao" name="parceladoNoCartao">
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label for="parceladoNoCartao" class="form-label">Curso a vista:</label>
                        <input type="text" class="form-control" id="parceladoNoCartao" name="parceladoNoCartao">
                    </div>

                    <div class="col-sm-6 mt-3" id="parcela1" style="display: none;">
                        <table class="table">
                            <tr>
                                <td>1º Parcela:</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="valorPrimeiraParcela"
                                        name="valorPrimeiraParcela" step="0.01"
                                        placeholder="Digite o valor da primeira parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="dataPrimeiraParcela"
                                        name="dataPrimeiraParcela">
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6 mt-3" id="parcela2" style="display: none;">
                        <table class="table">
                            <tr>
                                <td>2º Parcela:</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="valorSegundaParcela"
                                        name="valorSegundaParcela" step="0.01"
                                        placeholder="Digite o valor da segunda parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="dataSegundaParcela"
                                        name="dataSegundaParcela">
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6 mt-3" id="parcela3" style="display: none;">
                        <table class="table">
                            <tr>
                                <td>3º Parcela:</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="valorTerceiraParcela"
                                        name="valorTerceiraParcela" step="0.01"
                                        placeholder="Digite o valor da terceira parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="dataTerceiraParcela"
                                        name="dataTerceiraParcela">
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6 mt-3" id="parcela4" style="display: none;">
                        <table class="table">
                            <tr>
                                <td>4º Parcela:</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="valorQuartaParcela"
                                        name="valorQuartaParcela" step="0.01"
                                        placeholder="Digite o valor da quarta parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="dataQuartaParcela"
                                        name="dataQuartaParcela">
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6 mt-3" id="parcela5" style="display: none;">
                        <table class="table">
                            <tr>
                                <td>5º Parcela:</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="valorQuintaParcela"
                                        name="valorQuintaParcela" step="0.01"
                                        placeholder="Digite o valor da quinta parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="dataQuintaParcela"
                                        name="dataQuintaParcela">
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6 mt-3" id="parcela6" style="display: none;">
                        <table class="table">
                            <tr>
                                <td>6º Parcela:</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="valorSextaParcela"
                                        name="valorSextaParcela" step="0.01"
                                        placeholder="Digite o valor da sexta parcela">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" id="dataSextaParcela"
                                        name="dataSextaParcela">
                                </td>
                            </tr>
                        </table>
                    </div>

                    <script src="js/parcela.js"></script>





                    <div class="col-sm-3 mt-3">
                        <label for="teorico" class="form-label">Teorico:</label>
                        <input type="date" class="form-control" id="teorico" name="teorico">
                    </div>

                    <div class="col-sm-3 mt-3">
                        <label for="pratico1" class="form-label">Pratico:</label>
                        <input type="date" class="form-control" id="pratico1" name="pratico1">
                    </div>

                    <div class="col-sm-3  mt-3">
                        <label for="pratico2" class="form-label">Pratico:</label>
                        <input type="date" class="form-control" id="pratico2" name="pratico2">
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
                        <label for="dataExameA" class="form-label">Data Exame A:</label>
                        <input type="date" class="form-control" id="dataExameA" name="dataExameA">
                    </div>

                    <div class="col-sm-3  mt-3">
                        <label for="udataExameBf" class="form-label">Data Exame B:</label>
                        <input type="date" class="form-control" id="dataExameB" name="dataExameB">
                    </div>

                    <div class="col-sm-3  mt-3">
                        <label for="dataExameD" class="form-label">Data Exame D:</label>
                        <input type="date" class="form-control" id="dataExameD" name="dataExameD">
                    </div>
                    <div class="col-12 mt-3">
                        <button type="date" name="cadastrar" class="btn custom-button">Cadastrar</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <br><br>
    <footer id="footer" class="footer custom-footer">

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
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer><!-- End Footer -->
</body>

</html>
