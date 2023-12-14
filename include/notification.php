<script>
function exibirNotificacao(mensagem, timestamp) {
    var modalBody = document.getElementById("modalBody");

    var dataAtual = new Date();
    var dataCriacao = new Date(timestamp * 1000); 
    
    if (
        (dataAtual - dataCriacao) / (1000 * 60 * 60 * 24) > 45 &&
        (dataAtual - dataCriacao) / (1000 * 60 * 60 * 24) <= 47
    ) {
        var novaNotificacao = document.createElement("div");
        novaNotificacao.className = "notificacao";
        novaNotificacao.innerHTML = mensagem;

        var botaoApagar = document.createElement("button");
        botaoApagar.innerHTML = "Apagar";
        botaoApagar.className = "btn btn-danger btn-sm btn-apagar";
        botaoApagar.onclick = function () {
            modalBody.removeChild(novaNotificacao);
        };

        novaNotificacao.appendChild(botaoApagar);

        modalBody.appendChild(novaNotificacao);
    }

    setTimeout(verificarNotificacoes, 45 * 24 * 60 * 60 * 1000);
}

function verificarNotificacoes() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var resposta = JSON.parse(this.responseText);
            exibirNotificacao(resposta.mensagem, resposta.timestamp);
        }
    };
    xmlhttp.open("GET", "verificar_notificacoes.php", true);
    xmlhttp.send();
}

setTimeout(verificarNotificacoes, 45 * 24 * 60 * 60 * 1000);

$(document).ready(function () {
    var bellIcon = $('#bell-icon');

    bellIcon.mouseenter(function () {
        $('#notificationModal').modal('show');
    });

    bellIcon.mouseleave(function () {
        $('#notificationModal').modal('hide');
    });
});
</script>