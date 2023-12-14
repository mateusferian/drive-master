<!DOCTYPE html>
<html lang="en">
<?php
include_once('restrito.php');
include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
// include_once('include/carousel.php');
include_once('./conexao/Conexao.php');
include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');

$client = new Client();
$clientDAO = new ClientDAO();

if (isset($_GET["deletado"])) { 
    
    echo "<script>
        Swal.fire({
        icon: 'success',
        title: 'Aluno(a) deletado com sucesso!',
        customClass: {
            popup: 'swalFire',
        },
        showConfirmButton: false,
        allowOutsideClick: false  
    });
        
    setTimeout(function() {
            window.location.href = 'controle-de-aluno.php';
    }, 5000);
    </script>";
}
?>
<style>
    .breadcrumbs {
    padding: 20px;
    background-color: var(--color-primary);
    color: var(--color-seventh);
    border-bottom: 1px solid var(--color-seventh);
}

.page-header {
    background-size: cover;
    color: var(--color-seventh);
    padding: 80px 0;
    text-align: center;
}

.page-header h2 {
    font-size: 2.5em;
    margin-bottom: 20px;
}

p {
    font-size: 1.2em;
    line-height: 1.6;
}

.container {
    position: relative;
}

.row {
    justify-content: center;
}

.col-lg-6 {
    text-align: center;
}


.card {
    background-color: var(--color-fifth);
    padding: 10px;
    border-radius: 0;
}

.card {
    background-color: #f2f2f2; /* Cinza Claro */
    padding: 10px;
    border: 1px solid #ccc;
    margin: 20px 0; 
}

.card-link {
    text-decoration: none;
    color: var(--color-primary);
    font-weight: bold;
    transition: color 0.3s, background-color 0.3s;
}

.card-link:hover {
    color: #55A4D9;
}

.card-link:active {
    color: var(--color-third);
}
</style>
<body>
<div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h1>Controle De alunos</h1>
                        <p>Domine a administração com facilidade <br>
                            controle, eficiência e emoção em cada clique!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="card mt-0">
        <div class="container d-flex">
        <a href="controle-de-aluno.php#opcoes-de-filtragem" class="card-link">Opções de filtragem</a>
            <a href="controle-de-aluno.php#tabela-de-aluno" class="card-link">Tabela dos alunos</a>
        </div>
    </nav>

    <div class="container">
    <div class="row">
        <form method="get" id="opcoes-de-filtragem">
            <p class="fs-5 mt-5">Opções de filtragem:</p>
            <select class="form-control" name="filtro" id="filtro">
                <option value="opcao" <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'opcao' ? 'selected' : ''; ?>>Sem filtro</option>
                <option value="opcao0" <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'opcao0' ? 'selected' : ''; ?>>CPF</option>
                <option value="opcao1" <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'opcao1' ? 'selected' : ''; ?>>RG</option>
                <option value="opcao2" <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'opcao2' ? 'selected' : ''; ?>>Nome</option>
            </select>

            <div class="filterCpf mt-2" <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'opcao0' ? '' : 'style="display: none;"'; ?>>
                <label for="cpf">CPF:</label>
                <input type="number" class="form-control" id="cpf" name="cpf" placeholder="Digite o cpf do aluno que você procura" value="<?php echo isset($_GET['cpf']) ? htmlspecialchars($_GET['cpf']) : ''; ?>">
            </div>

            <div class="filterRg mt-2" <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'opcao1' ? '' : 'style="display: none;"'; ?>>
                <label for="rg">RG:</label>
                <input type="number" class="form-control" id="rg" name="rg" placeholder="Digite o rg do aluno que você procura" value="<?php echo isset($_GET['rg']) ? htmlspecialchars($_GET['rg']) : ''; ?>">
            </div>

            <div class="filterName mt-2" <?php echo isset($_GET['filtro']) && $_GET['filtro'] == 'opcao2' ? '' : 'style="display: none;"'; ?>>
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do aluno que você procura" value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : ''; ?>">
            </div>
            <div class="col-12 mt-3">
                <button type="submit" name="filter" class="btn customButton">Filtrar</button>
            </div>
        </form>
    </div>
</div>

<script src="js/filter.js"></script>
<script src="js/selected.js"></script>
<script src="js/updateUrl.js"></script>

<br><br>
    <div class="container" id="tabela-de-aluno">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>email</th>
                    <th>rg</th>
                    <th>cpf</th>
                    <th colspan="4" scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php 

                    $results_per_page = 20;
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                    $filtro = isset($_GET["filtro"]) ? $_GET["filtro"] : "";
                    $cpf = ($filtro == 'opcao0') ? (isset($_GET["cpf"]) ? $_GET["cpf"] : "") : "";
                    $rg = ($filtro == 'opcao1') ? (isset($_GET["rg"]) ? $_GET["rg"] : "") : "";
                    $name = ($filtro == 'opcao2') ? (isset($_GET["name"]) ? $_GET["name"] : "") : "";
                    
                

                    $limit_start = ($current_page - 1) * $results_per_page;
                    $clients = $clientDAO->filtersWithPagination($filtro, $cpf, $rg, $name, $limit_start, $results_per_page);

                    foreach ($clients as $client) : ?>
                <tr>
                    <td><?= $client->getIdClient() ?></td>
                    <td><?= $client->getName() ?></td>
                    <td><?= $client->getEmail() ?></td>
                    <td><?= $client->getRg() ?></td>
                    <td><?= $client->getCpf() ?></td>

                    <td width="25" heigh="94">
                        <a href="alterar-aluno.php?al=<?= $client->getIdClient() ?>">
                            <center> <img src="img/buttonImage/update.ico" height="25" width="25" title="Alterar">
                            </center>
                        </a>
                    </td>

                    <td width="57" heigh="94">
                        <a href="controller/ClientController.php?del=<?= $client->getIdClient() ?>">
                            <center> <img src="img/buttonImage/lixeira.png" height="25" width="25" title="Excluir">
                            </center>
                        </a>
                    </td>

                    <td width="57" heigh="94">
                        <a href="formulario-de-consulta.php?consulta=<?= $client->getIdClient() ?>">
                            <center> <img src="img/buttonImage/documento.png" height="25" width="25" title="Conultar">
                            </center>
                        </a>
                    </td>

                    <td width="57" heigh="94">
                        <a href="gerar-pdf.php?pdf=<?= $client->getIdClient() ?>">
                            <center> <img src="img/buttonImage/pdf.png" height="25" width="25" title="baixar pdf">
                            </center>
                        </a>
                    </td>

                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <div class="pagination d-flex justify-content-center">
            <?php
                $total_pages = ceil($clientDAO->countTotalClients($filtro, $cpf, $rg, $name) / $results_per_page);
                $max_pages = 5;

                $start_page = max(1, $current_page - floor($max_pages / 2));
                $end_page = min($total_pages, $start_page + $max_pages - 1);

                $start_page = max(1, $end_page - $max_pages + 1);

                if ($start_page > 1) {
                    echo "<a class='page-link btn-pagination' href='?page=" . ($start_page - 1) . "&filtro=" . urlencode($filtro) . "&cpf=" . urlencode($cpf) . "&rg=" . urlencode($rg) . "&name=" . urlencode($name) . "'>&lt;&lt;</a>";
                }


                for ($i = $start_page; $i <= $end_page; $i++) {
                    $active_class = ($i == $current_page) ? 'active' : '';
                    echo "<a class='page-link btn-pagination $active_class' href='?page=" . $i . "&filtro=" . urlencode($filtro) . "&cpf=" . urlencode($cpf) . "&rg=" . urlencode($rg) . "&name=" . urlencode($name) . "'>" . $i . "</a>";
                }

                if ($end_page < $total_pages) {
                    echo "<a class='page-link btn-pagination' href='?page=" . ($end_page + 1) . "&filtro=" . urlencode($filtro) . "&cpf=" . urlencode($cpf) . "&rg=" . urlencode($rg) . "&name=" . urlencode($name) . "'>&gt;&gt;</a>";
                }
            ?>
        </div>
    </div>

    <br><br>
    <?php
    include_once('include/footer.php');
    include_once('include/scrollTop.php');
    ?>
</body>

</html>