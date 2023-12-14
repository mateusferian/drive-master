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
    
    <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="controle-de-aluno.php" class="logo d-flex align-items-center">
            <h1 href=>Autoescola Líder<span>.</span></h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li class="dropdown">
                    <a href="#"><span>Controle</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="controle-de-aluno.php">Controle de Aluno</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#"><span>Cadastro</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="cadastro-de-aluno.php">Cadastro de Aluno</a></li>
                    </ul>
                </li>

                <li><a href="graficos.php">Graficos</a></li>

                <li class="dropdown">
                    <a href="#"><span>Conta</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="conta.php">Dados da conta</a></li>
                        <li><a href="logout.php">Sair</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" id="bell-icon"><span class="bi bi-bell"></span></a>
                </li>
            </ul>
        </nav>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
</header>

<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Notificações</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- Conteúdo do modal aqui -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <!-- Outros botões de ação, se necessário -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS e dependências -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"
        integrity="sha384-kJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script>
        function exibirNotificacao(mensagem) {
            var modalBody = document.getElementById("modalBody");

            var novaNotificacao = document.createElement("div");
            novaNotificacao.className = "notificacao";
            novaNotificacao.innerHTML = mensagem;

            // Adiciona um botão para apagar a notificação
            var botaoApagar = document.createElement("button");
            botaoApagar.innerHTML = "Apagar";
            botaoApagar.className = "btn btn-danger btn-sm btn-apagar";
            botaoApagar.onclick = function () {
                modalBody.removeChild(novaNotificacao);
            };

            novaNotificacao.appendChild(botaoApagar);

            modalBody.appendChild(novaNotificacao);
        }

        function verificarNotificacoes() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    exibirNotificacao(this.responseText);
                }
            };
            xmlhttp.open("GET", "verificar_notificacoes.php", true);
            xmlhttp.send();
        }

        setInterval(verificarNotificacoes, 5000);

        $(document).ready(function () {
            var bellIcon = $('#bell-icon');

            bellIcon.mouseenter(function () {
                $('#notificationModal').modal('show');
            });

            bellIcon.mouseleave(function () {
                $('#notificationModal').modal('hide');
            });
        });
    </script> -->

    <script>
function exibirNotificacao(mensagem, timestamp) {
    var modalBody = document.getElementById("modalBody");

    var dataAtual = new Date();
    var dataCriacao = new Date(timestamp * 1000); // Converte o timestamp para milissegundos
    
    // Verifica se a notificação está dentro do período de 2 dias após os 45 dias
    if (
        (dataAtual - dataCriacao) / (1000 * 60 * 60 * 24) > 45 &&
        (dataAtual - dataCriacao) / (1000 * 60 * 60 * 24) <= 47
    ) {
        var novaNotificacao = document.createElement("div");
        novaNotificacao.className = "notificacao";
        novaNotificacao.innerHTML = mensagem;

        // Adiciona um botão para apagar a notificação
        var botaoApagar = document.createElement("button");
        botaoApagar.innerHTML = "Apagar";
        botaoApagar.className = "btn btn-danger btn-sm btn-apagar";
        botaoApagar.onclick = function () {
            modalBody.removeChild(novaNotificacao);
        };

        novaNotificacao.appendChild(botaoApagar);

        modalBody.appendChild(novaNotificacao);
    }

    // Define o próximo chamado após 45 dias
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

// Inicializa o primeiro chamado após 45 dias
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


