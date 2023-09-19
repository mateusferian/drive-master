<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuario</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link href="css/carrocel.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="imagens/logo.png" alt="ETEC Games"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Controle de aluno</a>
                    <a class="nav-link" href="#produtos">Cadastro de reposição</a>
                    <a class="nav-link" href="#localizacao">Cadastro de aula extra</a>
                    <a class="nav-link" href="#contato">Ajuda</a>
                </div>
            </div>
        </div>
    </nav>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imagensDoSite/carrocel1.jpg" class="d-block w-100 imagem-carrossel" alt="banner 1">
            </div>
            <div class="carousel-item">
                <img src="imagensDoSite/carrocel2.jpg" class="d-block w-100 imagem-carrossel" alt="banner 2">
            </div>
            <div class="carousel-item">
                <img src="imagensDoSite/carrocel3.jpg" class="d-block w-100 imagem-carrossel" alt="banner 3">
            </div>
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

                </div>

                <div class="col-12  mt-3">
                    <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>