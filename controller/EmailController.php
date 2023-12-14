<?php
    ob_start();
    include_once "../conexao/Conexao.php";
    include_once "../model/Administrator.php";
    include_once "../dao/AdministratorDAO.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../assets/libs/PHPMailerLib/vendor/autoload.php';
    
    $PHPMailer = new PHPMailer(true);
    $administrator = new Administrator();
    $administratorDAO = new AdministratorDAO();

    $d = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $bytes = random_bytes(7);
    $valueNumber = bin2hex($bytes);

    if (!empty($d['recoverPassword'])) {
        $amount = $administratorDAO->countByEmail($d['email']);
        
        if ($amount !== 0) {
            $administrator = $administratorDAO->findByEmail($d['email']);
            $keyRecoverPassword = password_hash($administrator->getIdAdministrator(), PASSWORD_DEFAULT);

            if ($administratorDAO->updateRecoveryKey($administrator->getIdAdministrator(), $keyRecoverPassword)) {
                $link = "http://localhost/drive-master/atualizar-senha.php?chave=$keyRecoverPassword";

                try {

                    $PHPMailer->CharSet = 'UTF-8';
                    $PHPMailer->isSMTP();
                    $PHPMailer->Host       = 'smtp.googlemail.com';
                    $PHPMailer->SMTPAuth   = true;
                    $PHPMailer->Username   = 'carlosantoniocleiton@gmail.com';
                    $PHPMailer->Password   = 'ngcb dyyg kksd zstf ';
                    $PHPMailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $PHPMailer->Port       = 587;
                
                    $PHPMailer->setFrom('carlosantoniocleiton@gmail.com', 'Atendimento Drivemaster');
                    $PHPMailer->addAddress($administrator->getEmail(), $administrator->getNameAdministrator());

                    $PHPMailer->isHTML(true);                                  
                    $PHPMailer->Subject = 'Recuperar senha';
                    $PHPMailer->Body    = 'Prezado(a) ' . $administrator->getNameAdministrator() .".<br><br>Você solicitou alteração de senha.<br><br>Para continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: <br><br><a href='" . $link . "'>" . $link . "</a><br><br>Se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.<br><br>";
                    $PHPMailer->AltBody = 'Prezado(a) ' . $administrator->getNameAdministrator() ."\n\nVocê solicitou alteração de senha.\n\nPara continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: \n\n" . $link . "\n\nSe você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.\n\n";

                    $PHPMailer->send();

                    header("Location: ../esqueci-senha.php?sucesso=" . urlencode($valueNumber));
                    exit;

                } catch (Exception $e) {
                    header("Location: ../esqueci-senha.php?erro=" . urlencode($valueNumber));
                    exit;
                }

            } else {
                header("Location: ../esqueci-senha.php?erro=" . urlencode($valueNumber));
                exit;
            }

        } else {
            header("Location: ../esqueci-senha.php?usuario-nao-encontrado=" . urlencode($valueNumber));
            exit;
        }
    }
?>