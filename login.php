<?php
if (isset($_POST['access']) && !empty($_POST["email"]) && !empty($_POST["password"])) {

    include_once('config.php');

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM tb_administrator WHERE email = '$email'";
    $res = $conn->query($sql);

    if (mysqli_num_rows($res) < 1) {
        header("Location: index.php?erro=1111");
    } else {
        $row = $res->fetch_assoc();
        $storedPassword = $row['password_administrator'];

        if (password_verify($password, $storedPassword)) {
            session_start();
            $_SESSION["name_administrator"] = $row['name_administrator'];
            $_SESSION["email"] = $email;
            header("Location: controle-de-aluno.php");
            exit();
        } else {
            header("Location: index.php?erro=1111");
        }
    }
}
?>

