<!DOCTYPE html>
<html lang="en">
<?php
include_once('include/header.php');
?>
<body>
<?php
include_once('include/topbar.php');
include_once('include/navbar.php');
include_once('include/carousel.php');
?>

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




    <br><br>
    <?php
    include_once('include/footer.php');
    include_once('include/scrollTop.php');
    ?>
</body>

</html>