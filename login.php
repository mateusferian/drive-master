<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/loginStyle.css">
</head>
<body>
  <?php
    require_once "../connection.php";

    try{
        if (isset($_REQUEST["access"])) {

            $email = $_REQUEST['email'];
            $passwords = $_REQUEST['password'];

            $queryAdministrator = $conn->prepare("SELECT * FROM  adminTable WHERE email=:email;");

            $queryAdministrator->bindValue(':email' , $email);
            $queryAdministrator->execute();
            $rowAdministrator = $queryAdministrator->fetch(PDO::FETCH_ASSOC);
            $totalRowAdministrator = $queryAdministrator ->rowCount();

         
            if((password_verify($passwords, $rowAdministrator['password'])) || (password_verify($passwords, $rowAluno['password']))){
                
                if($totalRowAdministrator > 0 ){
                    session_start();

                    $_SESSION['email'] = $rowAdministrator['email'];
                    
                    $_SESSION['password'] = $rowAdministrator['password'];
                    
                    $_SESSION['nome'] = $rowAdministrator['nome'];

                    header(("location:cadastro-alunos.php"));
                }
    
            } else{
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'email ou senha incorretos',
                    customClass: {
                        popup: 'swalFireLogin', // Classe CSS personalizada para a caixa de diálogo
                    },
                    showConfirmButton: false,
                    allowOutsideClick: false  
                });
        
                // Redirecione automaticamente após um breve atraso
                setTimeout(function() {
                    window.location.href = '../index.php';
                }, 3000); // Tempo em milissegundos (2 segundos no exemplo) antes de redirecionar
            </script>";
            }
        }

    }  catch (PDOException $erro) {
        echo $erro->getMessage();
      }
  ?>
    
</body>
</html>