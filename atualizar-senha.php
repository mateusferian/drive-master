<?php
ob_start();
include_once('include/header.php');
include_once "conexao/Conexao.php";
include_once "model/Administrator.php";
include_once "dao/AdministratorDAO.php";

$administrator = new Administrator();
$administratorDAO = new AdministratorDAO();
$key = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);
?>

<link rel="stylesheet" href="css/form.css">

<body style="background-image: url('include/backgroundImage.php');">

    <div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;" data-aos="zoom-out"
        data-aos-delay="100">
        <div class="container mt-4">
            <div class="col-md-6 offset-md-3">
                <div class="form">

                    <br><br>
                    <h1 class="text-center">Atualizar Senha</h1>
                    <br><br>

                    <form method="POST" action="controller/AdministratorController.php">

                        <div class="col-sm-12  mt-3" hidden>
                            <label for="recoveryKey" class="form-label">Chave:</label>
                            <input type="text" class="form-control" id="recoveryKey" name="recoveryKey"
                                value="<?php if(isset($key)) { echo $key; } ?>" readonly="readonly">
                        </div>

                        <div class="formGroup">
                            <div class="col-md-6 offset-md-3">
                                <label>Senha</label>
                                <input type="password" name="user_password" placeholder="Digite a nova senha"
                                    class="formControl" pattern="^(?=.*[0-9])(?=.*[^a-zA-Z0-9]).{8,}$"
                                    title="Pelo menos 8 caracteres, 1 número e 1 símbolo são obrigatórios" required>
                                <br><br>
                            </div>
                        </div>

                        <div class="form-group">
                            <a href="index.php" class="formLink">Lembrou? clique aqui para logar</a>
                        </div>

                        <br><br>
                        <div class="formGroup">
                            <div class="col-md-4 offset-md-4">
                                <input type="submit" value="Atualizar" name="SendNovaSenha" id="formButton">
                            </div>
                        </div>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
        if (!empty($key)) {

            if ($administratorDAO->countByPasswordKey($key) == 0) {
                $bytes = random_bytes(7);
                $valorErro = bin2hex($bytes);
        
                header("Location: esqueci-senha.php?link-invalido=" . urlencode($valorErro));
                exit;
            }

        } else {
            $bytes = random_bytes(7);
            $valorErro = bin2hex($bytes);

            header("Location: esqueci-senha.php?link-invalido=" . urlencode($valorErro));
            exit;
        }
        ?>
</body>
<script>
AOS.init();
</script>

</html>