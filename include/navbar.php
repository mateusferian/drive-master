
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
                    <a href="#" id="bell-icon" class="position-relative">
                        <span class="bi bi-bell"></span>
                        <span id="notificacao-badge"
                            class="badge bg-danger rounded-circle position-absolute top-0 start-100 translate-middle"></span>
                    </a>
                </li>


            </ul>
        </nav>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
</header>

<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationModalLabel">Notificações</h5>
                <button type="button" class="close" id="fecharModalBtn" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn customButton" id="fecharModalFooterBtn">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script src="js/modal.js"></script>
<script src="js/notification.js"></script>