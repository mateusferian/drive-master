<!DOCTYPE html>
<html lang="en">
<?php

include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
include_once('include/carousel.php');
include_once('./conexao/Conexao.php');
include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');


$client = new Client();
$clientDAO = new ClientDAO();
?>

<body>
    <script src="js/filter.js"></script>
    <div class="container">
        <div class="row">
            <form method="get">
                <p class="fs-5 mt-5">Opções de filtragem:</p>
                <select class="form-control" name="filtro">
                    <option value="opcao">Sem filtro</option>
                    <option value="opcao0">CPF</option>
                    <option value="opcao1">RG</option>
                    <option value="opcao2">Nome</option>
                    <option value="opcao3">Parcelas em aberto</option>
                    <option value="opcao4">Parcelas realizadas</option>
                </select>

                <div class="filterCpf mt-2">
                    <label for="cpf">CPF:</label>
                    <input type="number" class="form-control" id="cpf" name="cpf"
                        placeholder="Digite o cpf do aluno que você procura">
                </div>

                <div class="filterRg mt-2">
                    <label for="rg">RG:</label>
                    <input type="number" class="form-control" id="rg" name="rg"
                        placeholder="Digite o rg do aluno que você procura">
                </div>

                <div class="filterName mt-2">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Digite o nome do aluno que você procura">
                </div>

                <div class="openParcelFilter mt-2">
                    <label for="openParcel">Mês da parcela em aberto:</label>
                    <input type="date" class="form-control" id="openParcel" name="openParcel">
                </div>

                <div class="filterRealizedParcels mt-2">
                    <label for="RealizedParcels">Mês da parcela realizada:</label>
                    <input type="date" class="form-control" id="RealizedParcels" name="RealizedParcels">
                </div>

                <div class="col-12 mt-3">
                    <button type="submit" name="filter" class="btn customButton">Filtrar</button>
                </div>
            </form>
        </div>
    </div>

    <p class="fs-2 text-center mt-5">Controle De alunos</p>
    <div class="container">
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
                <?php foreach ($clientDAO->read() as $client) : ?>
                <tr>
                    <td><?= $client->getIdClient() ?></td>
                    <td><?= $client->getName() ?></td>
                    <td><?= $client->getEmail() ?></td>
                    <td><?= $client->getRg() ?></td>
                    <td><?= $client->getCpf() ?></td>

                    <td width="25" heigh="94">
                    <a href="alterar-aluno.php?al=<?= $client->getIdClient() ?>">
                            <center> <img src="img/buttonImage/update.ico" height="25" width="25" title="Alterar"></center>
                        </a>
                    </td>

                    <td width="57" heigh="94">
                    <a href="controller/ClientController.php?del=<?= $client->getIdClient() ?>">
                            <center> <img src="img/buttonImage/lixeira.png" height="25" width="25" title="Excluir"></center>
                        </a>
                    </td>

                    <td width="57" heigh="94">
                        <a href="formulario-de-consulta.php?consulta=<?= $client->getIdClient() ?>">
                        <center> <img src="img/buttonImage/documento.png" height="25" width="25" title="Conultar"></center>
                        </a>
                    </td>

                    <td width="57" heigh="94">
                    <a href="gerar-pdf-do-aluno.php?pdf=<?= $client->getIdClient() ?>">
                        <center> <img src="img/buttonImage/pdf.png" height="25" width="25" title="baixar pdf"></center>
                        </a>
                    </td>

                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <br><br>
    <?php
    include_once('include/footer.php');
    include_once('include/scrollTop.php');
    ?>
</body>

</html>