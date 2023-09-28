<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/loginEstilo.css">
</head>
<body>
  <?php
    require_once "../conexao.php";

    try{
        if (isset($_REQUEST["acessar"])) {

            $email = $_REQUEST['email'];
            $senhas = $_REQUEST['senha'];

            $consultaAdministrador = $conn->prepare("SELECT * FROM  tbl_administrador WHERE email=:email;");

            $consultaAdministrador->bindValue(':email' , $email);
            $consultaAdministrador->execute();
            $rowAdministrador = $consultaAdministrador->fetch(PDO::FETCH_ASSOC);
            $totalRowAdministrador = $consultaAdministrador ->rowCount();

         
            if((password_verify($senhas, $rowAdministrador['senha'])) || (password_verify($senhas, $rowAluno['senha']))){
                
                if($totalRowAdministrador > 0 ){
                    session_start();

                    $_SESSION['email'] = $rowAdministrador['email'];
                    
                    $_SESSION['senha'] = $rowAdministrador['senha'];
                    
                    $_SESSION['nome'] = $rowAdministrador['nome'];

                    header(("location:../administrador/controleDeAluno.php"));
                }
    
                if($totalRowAluno > 0 ){

                    // session_start();

                    // $_SESSION['email'] = $rowAluno['email'];
                    
                    // $_SESSION['senha'] = $rowAluno['senha'];
                    
                    // $_SESSION['nome'] = $rowAluno['nome'];

                    header(("location: ../usuario/home.php"));
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