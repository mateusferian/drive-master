<?php
    // session_start();
?>

<header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="controle-de-aluno.php" class="logo d-flex align-items-center">
            <h1 href= >Autoescola Líder<span>.</span></h1>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li class="dropdown"><a href="#"><span>Controle</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                    <li><a href="controle-de-aluno.php">Controle de Aluno</a></li>
                        <li><a href="controle-de-aula-extra.php">Controle de Aula extra</a></li>
                    </ul>
                </li>

                <li class="dropdown"><a href="#"><span>Cadastro</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="cadastro-de-aluno.php">Cadastro de Aluno</a></li>
                        <li><a href="#">Cadastro de Aula extra</a></li>
                    </ul>
                </li>
                <li><a href="graficos.php">Graficos</a></li>
                <li><a href="#">Notificações</a></li>
                <li class="dropdown"><a href="#"><span>Conta</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                    <li><a href="conta.php">Dados da conta</a></li>
                        <li><a href="logout.php">sair</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
</header>