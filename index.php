<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login de usuarios</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"> </script>

    <link rel="stylesheet" href="login/css/loginEstilo.css">
    <!-- <link rel="stylesheet" href="css/index.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="login/js/imagemDeFundo.js"></script>
</head>

<body style="background-image: url('login/ImagemDeFundo.php');">

    <div id="myDiv" class="d-flex align-items-center" style="min-height: 100vh;" data-aos="zoom-out"
        data-aos-delay="100">
        <div class="container mt-4">
            <div class="col-md-6 offset-md-7">

                <form class="form" action="login/login.php" method="POST" name="formulario">
                    <br><br>
                    <h1 class="text-center">Login</h1>
                    <br><br>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>E-MAIL:</label>
                            <input type="text" name="email" class="form-control"
                                placeholder="digite o seu e-mail " required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <label>Senha</label>
                            <input type="password" name="senha" class="form-control" 
                            placeholder="digite a sua senha" required>
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-3">
                        <div class="align-vertical">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="mostrarSenha">
                                <label class="form-check-label" for="mostrarSenha">Mostrar senha</label>
                            </div>
                            <br>

                        </div>
                        <div class="align-vertical">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="lembrar">
                                <label class="form-check-label" for="lembrar">Lembre de mim</label>
                            </div>
                        </div>
                        <div class="align-vertical">
                            <a href="login/recuperarSenha/esqueciSenha.php" class="form-links">Esqueci minha senha</a>
                        </div>
                        <div class="align-vertical">
                            <a href="cadastroUsuario.php" class="form-links">Não tem uma conta? Cadastre-se</a>
                        </div>
                    </div>

                    <script>
                    document.getElementById("mostrarSenha").addEventListener("change", function() {
                        var senhaInput = document.getElementsByName("senha")[0];
                        senhaInput.type = this.checked ? "text" : "password";
                    });
                    </script>



                    <br><br>

                    <div class="form-group">
                        <div class="col-md-4 offset-md-4">
                            <input type="submit" value="Entrar" class="btn btn-primary" name="acessar" id="meuBotao">
                        </div>
                        <br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
    // Inicializa o AOS para ativar os efeitos na rolagem
    AOS.init();
    </script>
</body>

</html>