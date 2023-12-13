<?php
ob_start();
include_once('include/header.php');
include_once "conexao/Conexao.php";
include_once "model/Administrator.php";
include_once "dao/AdministratorDAO.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './lib/vendor/autoload.php';
$mail = new PHPMailer(true);
    $administrator = new Administrator();
    $administratorDAO = new AdministratorDAO();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-ico">
    <title>Celke - Recuperar Senha</title>
</head>

<body>
    <h1>Recuperar Senha</h1>

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['SendRecupSenha'])) {
        $quantidade = $administratorDAO->countByEmail($dados['usuario']);
        
        if ($quantidade !== 0) {
            $user = $administratorDAO->getUserByEmail($dados['usuario']);
            $chave_recuperar_senha = password_hash($user['idAdministrator'], PASSWORD_DEFAULT);

            if ($administratorDAO->updateRecoveryKey($user['idAdministrator'], $chave_recuperar_senha)) {
                $link = "http://localhost/celke/atualizar_senha.php?chave=$chave_recuperar_senha";

                try {
                    /*$mail->SMTPDebug = SMTP::DEBUG_SERVER;*/
                    $mail->CharSet = 'UTF-8';
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.mailtrap.io';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'e3efb8755943d1';
                    $mail->Password   = 'fe84283081bb96';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 2525;

                    $mail->setFrom('atendimento@celke.com', 'Atendimento');
                    $mail->addAddress($row_usuario['usuario'], $row_usuario['nome']);

                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Recuperar senha';
                    $mail->Body    = 'Prezado(a) ' . $row_usuario['nome'] .".<br><br>Você solicitou alteração de senha.<br><br>Para continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: <br><br><a href='" . $link . "'>" . $link . "</a><br><br>Se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.<br><br>";
                    $mail->AltBody = 'Prezado(a) ' . $row_usuario['nome'] ."\n\nVocê solicitou alteração de senha.\n\nPara continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: \n\n" . $link . "\n\nSe você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.\n\n";

                    $mail->send();

                    $_SESSION['msg'] = "<p style='color: green'>Enviado e-mail com instruções para recuperar a senha. Acesse a sua caixa de e-mail para recuperar a senha!</p>";
                    header("Location: index.php");
                } catch (Exception $e) {
                    echo "Erro: E-mail não enviado sucesso. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo  "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
            }
        } else {
            echo "<p style='color: #ff0000'>Erro: Usuário não encontrado!</p>";
        }
    }

    if (isset($_SESSION['msg_rec'])) {
        echo $_SESSION['msg_rec'];
        unset($_SESSION['msg_rec']);
    }

    ?>

    <form method="POST" action="">
        <?php
        $usuario = "";
        if (isset($dados['usuario'])) {
            $usuario = $dados['usuario'];
        } ?>

        <label>E-mail</label>
        <input type="text" name="usuario" placeholder="Digite o usuário" value="<?php echo $usuario; ?>"><br><br>

        <input type="submit" value="Recuperar" name="SendRecupSenha">
    </form>

    <br>
    Lembrou? <a href="index.php">clique aqui</a> para logar

</body>

</html>