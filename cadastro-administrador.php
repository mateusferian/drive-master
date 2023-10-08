<!DOCTYPE html>
<html lang="en">
<?php
include_once('include/header.php');
include_once "conexao/Conexao.php";
include_once "model/Administrator.php";
include_once "dao/AdministratorDAO.php";
include_once "controller/AdministratorController.php";
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
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>E-mail: </label>
                            <input type="email" name="email" class="form-control" placeholder="digite o seu e-mail "
                                required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>Nome completo:</label>
                            <input type="text" name="name" class="form-control" placeholder="digite o seu nome"
                                required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>Senha</label>
                            <input type="password" name="passwordAdministrator" class="form-control" required="">
                        </div>
                    </div>
                    <a class="form-links" href="index.php">Já tenho uma conta</a>
                    <br><br>

                    <div class="form-group">
                        <div class="col-md-5 offset-md-5">
                            <input type="submit" value="salvar" class="btn butonRegister" name="salvar">
                        </div>
                        <br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>