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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php
include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
?>
    </head>
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
    <body>
    <div class="container mt-5">
    <h1 class="text-center">Relatórios de Alunos</h1>
    <div class="row">
        <div class="col-md-6">
            <h2>Total de Alunos no ano atual</h2>
            <!-- Elemento Canvas para o gráfico de total de alunos -->
            <canvas id="totalStudentsChart" width="200" height="200"></canvas>
        </div>
        <div class="col-md-6">
            <h2>Alunos Aprovados e Reprovados</h2>
            <!-- Elemento Canvas para o gráfico de alunos aprovados/reprovados em Categorias A e B -->
            <canvas id="passFailCategoriesChart" width="200" height="200"></canvas>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Quantidade de alunos nos Últimos Anos</h2>
            <!-- Elemento Canvas para o gráfico de alunos nos últimos anos -->
            <canvas id="studentsLastYearsChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<script>
    // Dados de exemplo (substitua pelos seus dados reais)
    var months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'];
    var totalStudents = [150, 155, 160, 158, 165];
    var passCategoryA = [12, 15, 10, 8, 14];
    var passCategoryB = [10, 8, 12, 9, 11];
    var failCategoryA = [3, 5, 2, 4, 3];
    var failCategoryB = [4, 3, 5, 3, 4];
    var years = ['2018', '2019', '2020', '2021', '2022'];
    var studentsLastYears = [120, 140, 155, 160, 175];

    // Obtenha referências aos elementos dos gráficos
    var totalStudentsCtx = document.getElementById('totalStudentsChart').getContext('2d');
    var passFailCategoriesCtx = document.getElementById('passFailCategoriesChart').getContext('2d');
    var studentsLastYearsCtx = document.getElementById('studentsLastYearsChart').getContext('2d');

    // Configure os dados dos gráficos
    var totalStudentsData = {
        labels: months,
        datasets: [{
            label: 'Total de Alunos',
            data: totalStudents,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    };

    var passFailCategoriesData = {
        labels: months,
        datasets: [{
            label: 'Aprovados (Categoria A)',
            data: passCategoryA,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }, {
            label: 'Reprovados (Categoria A)',
            data: failCategoryA,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }, {
            label: 'Aprovados (Categoria B)',
            data: passCategoryB,
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }, {
            label: 'Reprovados (Categoria B)',
            data: failCategoryB,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    var studentsLastYearsData = {
        labels: years,
        datasets: [{
            label: 'Alunos nos Últimos Anos',
            data: studentsLastYears,
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderColor: 'rgba(153, 102, 255, 1)',
            borderWidth: 1
        }]
    };

    // Configure os gráficos
    var totalStudentsChart = new Chart(totalStudentsCtx, {
        type: 'line',
        data: totalStudentsData
    });

    var passFailCategoriesChart = new Chart(passFailCategoriesCtx, {
        type: 'bar',
        data: passFailCategoriesData
    });

    var studentsLastYearsChart = new Chart(studentsLastYearsCtx, {
        type: 'line',
        data: studentsLastYearsData
    });
</script>


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
