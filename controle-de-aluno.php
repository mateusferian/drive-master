<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link href="css/button.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php
include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
?>
    <?php
    $folderImages = 'img/carouselImage/';
    $extensoesPermitidas = array('jpg', 'jpeg', 'png');
    $image = array();

    if (is_dir($folderImages)) {
        $files = glob($folderImages . '*.{jpg,jpeg,png}', GLOB_BRACE);
        shuffle($files);
        $image = array_map(function($file) use ($folderImages) {
            return str_replace($folderImages, '', $file);
        }, $files);
    }
    ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php foreach ($image as $index => $imagem) : ?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $index; ?>"
                <?= $index === 0 ? 'class="active"' : '' ?> aria-label="Slide <?= ($index + 1); ?>"></button>
            <?php endforeach; ?>
        </div>
        <div class="carousel-inner">
            <?php foreach ($image as $index => $imagem) : ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <img src="<?= $folderImages . $imagem; ?>" class="d-block w-100 imagem-carrossel"
                    alt="banner <?= ($index + 1); ?>">
            </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Inclua o jQuery e os files JavaScript do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        // Intervalo para trocar automaticamente as image a cada 3 segundos (3000 ms)
        setInterval(function() {
            $('#carouselExampleIndicators').carousel('next');
        }, 9000);
    });
    </script>

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

                <!-- Campos de filtro com classes para ocultar/exibir -->
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
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>