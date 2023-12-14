<?php
include_once('./conexao/Conexao.php');
include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');

$client = new Client();
$clientDAO = new ClientDAO();

// Chama o método teste com o valor 25
function buscarNotificacao() {
    global $clientDAO;
    return $clientDAO->teste(25);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificações</title>
    <style>
        .notificacao-container {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        .notificacao {
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            padding: 10px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div id="notificacoes" class="notificacao-container"></div>

<script>
function exibirNotificacao(mensagem) {
    var notificacoesContainer = document.getElementById("notificacoes");

    var novaNotificacao = document.createElement("div");
    novaNotificacao.className = "notificacao";
    novaNotificacao.innerHTML = mensagem;

    notificacoesContainer.appendChild(novaNotificacao);
}

function verificarNotificacoes() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            exibirNotificacao(this.responseText);
        }
    };
    xmlhttp.open("GET", "verificar_notificacoes.php", true);
    xmlhttp.send();
}

setInterval(verificarNotificacoes, 5000);
</script>

</body>
</html>



