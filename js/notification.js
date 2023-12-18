var numeroNotificacoes = 0;

function exibirNotificacao(mensagem) {
    var modalBody = document.getElementById("modalBody");
    var notificacaoBadge = document.getElementById("notificacao-badge");
    var messages = mensagem.split(';');

    messages.forEach(function(message) {
        if (message.trim() !== "") {
            var novaNotificacao = document.createElement("div");
            novaNotificacao.className = "notificacao";

            var textoDiv = document.createElement("div");
            textoDiv.innerHTML = message;
            novaNotificacao.appendChild(textoDiv);

            var botaoDiv = document.createElement("div");

            var botaoApagar = document.createElement("button");
            botaoApagar.innerHTML = "Apagar";
            botaoApagar.className = "btn btn-danger btn-sm btn-apagar";
            botaoApagar.onclick = function() {
                modalBody.removeChild(novaNotificacao);
                numeroNotificacoes--;
                atualizarBolinha();
            };

            botaoDiv.appendChild(botaoApagar);
            novaNotificacao.appendChild(botaoDiv);

            modalBody.appendChild(novaNotificacao);

            numeroNotificacoes++;
            atualizarBolinha();
        }
    });
}

function atualizarBolinha() {
    var notificacaoBadge = document.getElementById("notificacao-badge");
    notificacaoBadge.innerText = numeroNotificacoes;

    if (numeroNotificacoes > 0) {
        notificacaoBadge.style.display = "block";
    } else {
        notificacaoBadge.style.display = "none";
    }
}

function verificarNotificacoes() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            exibirNotificacao(this.responseText);
        }
    };
    xmlhttp.open("GET", "include/checkNotification.php", true);
    xmlhttp.send();
}

function exibirModal() {
    $('#notificationModal').modal('show');
}

$(document).ready(function() {

    var bellIcon = $('#bell-icon');
    bellIcon.click(exibirModal);

        var intervaloEmMilissegundos = 45 * 24 * 60 * 60 * 1000;
    
        setTimeout(function() {
            verificarNotificacoes();
            agendarVerificacao();
        }, intervaloEmMilissegundos);
    }

);