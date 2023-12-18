<!DOCTYPE html>
<html lang="en">
<?php
include_once('include/header.php');
include_once "conexao/Conexao.php";
include_once "model/Administrator.php";
include_once "dao/AdministratorDAO.php";
?>
<link rel="stylesheet" href="css/form.css">
<link rel="stylesheet" href="css/buttonRegister.css">

<body style="background-image: url('include/backgroundImage.php');">
    <script>
    AOS.init();
    </script>
    <style>
    </style>

    <div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;" data-aos="zoom-out"
        data-aos-delay="100">
        <div class="container mt-4">
            <div class="col-md-6 offset-md-3">
                <form class="form" action="controller/AdministratorController.php" method="POST" name="formulario">
                    <br><br>
                    <h1 class="text-center">Cadastro</h1>
                    <br><br>
                    <div class="formGroup">
                        <div class="col-md-6 offset-md-3">
                            <label>E-mail: </label>
                            <input type="email" name="email" class="formControl" placeholder="digite o seu e-mail "
                                required>
                        </div>
                    </div>

                    <div class="formGroup">
                        <div class="col-md-6 offset-md-3">
                            <label>Nome completo:</label>
                            <input type="text" name="name" class="formControl" placeholder="digite o seu nome" required>
                        </div>
                    </div>

                    <div class="formGroup">
                        <div class="col-md-6 offset-md-3">
                        <label>Senha:</label>
                        <input type="password" class="formControl" id="passwordAdministrator" name="passwordAdministrator" placeholder="Digite a sua senha"
                            pattern="^(?=.*[0-9])(?=.*[^a-zA-Z0-9]).{8,}$"
                            title="Pelo menos 8 caracteres, 1 número e 1 símbolo são obrigatórios" required>
                    </div>



                    <a class="formLink" href="index.php">Já tenho uma conta</a>

                    <br><br>

                    <div class="formGroup">
                        <div class="col-md-4 offset-md-4">
                            <input type="submit" value="salvar" class="btn btn-primary" name="salvar" id="formButton">
                        </div>
                        <br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php

if (isset($_GET["sucess"])) { 

            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Cadastro realizado com sucesso!',
                customClass: {
                    popup: 'swalFire',
                    icon: 'swalIcon'
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
        title: 'O e-mail já está sendo utilizado!',
        html: '<p>escolha um outro e-mail para se cadastrar</p>',
        customClass: {
            popup: 'swalFire',
        },
        showConfirmButton: false,
        allowOutsideClick: false  
    });

    setTimeout(function() {
        window.location.href = 'cadastro-administrador.php';
    }, 4000);
</script>";
};
?>
</body>

</html>