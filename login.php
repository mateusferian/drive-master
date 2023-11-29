<?php
    if(isset($_POST['access']) && !empty($_POST["email"]) && !empty($_POST["password"])){
        
        include_once('config.php');

        $email = $_POST["email"];
    	$password = $_POST["password"];

            $sql = "SELECT * FROM tb_administrator WHERE email = '$email' AND password_administrator = '$password'";
            $res = $conn->query($sql);

            if(mysqli_num_rows($res) < 1){
                     header("Location: index.php?erro=1111");

            } 
            else if(mysqli_num_rows($res) >= 1){{
                session_start();
                $row = $res->fetch_object(); 
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                print "<script>location.href='controle-de-aluno.php';</script>";
            } 
        }
    }
?>