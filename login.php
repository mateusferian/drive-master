<?php
    if(isset($_POST['access']) && !empty($_POST["email"]) && !empty($_POST["password"])){
        
        include_once('config.php');

        $email = $_POST["email"];
    	$password = $_POST["password"];

            $sql = "SELECT * FROM tb_administrator WHERE email = '$email' AND password_administrator = '$password'";
            $res = $conn->query($sql);

            if(mysqli_num_rows($res) < 1){
                print "<script>alert('Email e/ou senha incorretos');</script>";
                print "<script>location.href='index.php';</script>"; 

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