<?php
ob_start();
include_once('include/header.php');
include_once "conexao/Conexao.php";
include_once "model/Administrator.php";
include_once "dao/AdministratorDAO.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './assets/libs/PHPMailerLib/vendor/autoload.php';

$mail = new PHPMailer(true);
$administrator = new Administrator();
$administratorDAO = new AdministratorDAO();
?>
<link rel="stylesheet" href="css/form.css">

<body style="background-image: url('include/backgroundImage.php');">


    <div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;" data-aos="zoom-out"
        data-aos-delay="100">
        <div class="container mt-4">
            <div class="col-md-6 offset-md-3">
                <div class="form">
                    
                    <br><br>
                    <h1 class="text-center">Recuperar Senha</h1>
                    <br><br>

                    <form method="POST" action="controller/EmailController.php">

                        <div class="formGroup">
                            <div class="col-md-6 offset-md-3">
                                <label for="usuario">E-mail</label>
                                <input type="email" id="email" name="email" class="formControl"
                                    placeholder="Digite o usuário" required>
                            </div>
                        </div>

                        <div class="form-group">
                        <a href="index.php" class="formLink">Voltar para a area administrativa</a>
                    </div>
                        
                    <br><br>
                        <div class="formGroup">
                            <div class="col-md-4 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="Enviar" name="recoverPassword" id="formButton">
                            </div>
                        </div>
                    <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <?php
    if (isset($_GET["link-invalido"])) { 
    
        echo "<script>
            Swal.fire({
            icon: 'error',
            title: 'Link inválido!',
            html: '<p>solicite um novo link para atualizar a senha!!</p>',
            customClass: {
                popup: 'swalFire',
            },
            showConfirmButton: false,
            allowOutsideClick: false  
        });
            
        setTimeout(function() {
                window.location.href = 'esqueci-senha.php';
        }, 5000);
        </script>";
    }

    if (isset($_GET["sucesso"])) { 
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'E-mail enviado com sucesso!',
            html: '<p>Enviado e-mail com instruções para recuperar a senha. Acesse a sua caixa de e-mail para recuperar a senha!</p>',
            customClass: {
                popup: 'swalFire',
            },
            showConfirmButton: false,
            allowOutsideClick: false  
        });

        setTimeout(function() {
            window.location.href = 'index.php';
        }, 4000);
    </script>";
    }
    
    if (isset($_GET["erro"])) { 
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Erro Tente novamente!',
            customClass: {
                popup: 'swalFire',
            },
            showConfirmButton: false,
            allowOutsideClick: false  
        });

        setTimeout(function() {
            window.location.href = 'esqueci-senha.php';
        }, 4000);
    </script>";
    };

    if (isset($_GET["usuario-nao-encontrado"])) { 
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Usuário não encontrado!',
            customClass: {
                popup: 'swalFire',
            },
            showConfirmButton: false,
            allowOutsideClick: false  
        });

        setTimeout(function() {
            window.location.href = 'esqueci-senha.php';
        }, 4000);
    </script>";
    }

    if (isset($_GET["senha-alterada"])) { 
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Senha atualizada com sucesso!',
            customClass: {
                popup: 'swalFire',
            },
            showConfirmButton: false,
            allowOutsideClick: false  
        });

        setTimeout(function() {
            window.location.href = 'index.php';
        }, 4000);
    </script>";
    }
    ?>
    <script>
    AOS.init();
    </script>
</body>

</html>