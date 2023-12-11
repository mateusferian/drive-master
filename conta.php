<!DOCTYPE html>
<html lang="en">

<head>
    <?php
include_once('restrito.php');
include_once('include/header.php');
include_once('./conexao/Conexao.php');
include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');


$client = new Client();
$clientDAO = new ClientDAO();
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"> </script>
    <title>Auto Escola Lider</title>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="icon" type="image/png" sizes="16x16" href="assets/imagens/logoSite/logo.png">
    <link href="css/account.css" rel="stylesheet">

</head>

<body style="background-image: url('include/backgroundImage.php');">

    <div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;" data-aos="zoom-out"
        data-aos-delay="100">
        <div class="container mt-4">
            <div class="col-md-6 offset-md-3">
                <div class="form">
                    <br><br>
                    <h1 class="text-center">Conta</h1>
                    <br>
                    <br>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <div class="card custom-card">
                                <div class="card-body text-center">
                                    <p class="custom-text"><?php echo $_SESSION["name_administrator"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <div class="card custom-card">
                                <div class="card-body text-center">
                                    <p class="custom-text fs-10"> <?php echo $_SESSION["email"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <div class="card custom-card">
                                <form action="logout.php" method="post">
                                    <button type="submit" class="btn btn-primary card-body buttonCar accountPageButton"
                                        id="formButton">Sair</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <a href="controle-de-aluno.php" class="formLink">Voltar para a área administrativa</a>
                    </div>

                    <br><br>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
    // Inicializa o AOS para ativar os efeitos na rolagem
    AOS.init();
    </script>
</body>

</html>