<!DOCTYPE html>
<html lang="en">

<?php
include_once('restrito.php');
include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
?>

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="css/graphicsPage.css" rel="stylesheet">
</head>

<body>
    <?php
    include_once('./conexao/Conexao.php');

    include_once('./model/Client.php');
    include_once('./dao/ClientDAO.php');

    include_once('./model/Cnh.php');
    include_once('./dao/CnhDAO.php');

    $client = new Client();
    $clientDAO = new ClientDAO();

    $cnh = new Cnh();
    $cnhDAO = new CnhDAO();
    ?>

    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h1>Graficos</h1>
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
            <a href="graficos.php#total-alunos" class="card-link">Total de alunos nos últimos anos</a>
            <a href="graficos.php#total-alunos-categorias" class="card-link">Total de Alunos por Categoria</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <p id="total-alunos" class="fs-2 text-center mt-5">Total de alunos nos últimos anos</p>
            <div class="chart">
                <canvas id="studentsLastYearsChart" width="800" height="400"></canvas>
                <br><br>
                <nav class="pagination justify-content-center" aria-label="Page navigation example">
                    <ul class="pagination" id="pagination"></ul>
                </nav>
                <br><br>
            </div>
        </div>
    </div>

    <?php
    $years = $clientDAO->getDistinctYearsInTable();
    $studentsLastYears = $clientDAO->countStudentsByYears($years);

    $yearsJSON = json_encode($years);
    $studentsLastYearsJSON = json_encode($studentsLastYears);
    ?>

    <script>
        var years = <?php echo $yearsJSON; ?>;
        var studentsLastYears = <?php echo $studentsLastYearsJSON; ?>;

        var studentsLastYearsCtx = document.getElementById('studentsLastYearsChart').getContext('2d');
        var studentsLastYearsData = {
            labels: years,
            datasets: [{
                label: 'Alunos nos Últimos Anos',
                data: studentsLastYears,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        var maxStudents = Math.max(...studentsLastYears);
        var stepSize = calculateStepSize(maxStudents);
        var normalizedStep = Math.ceil(maxStudents / stepSize) * stepSize;

        var studentsLastYearsChart = new Chart(studentsLastYearsCtx, {
            type: 'line',
            data: studentsLastYearsData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: normalizedStep,
                        ticks: {
                            stepSize: stepSize,
                            callback: function(value) {
                                return value % stepSize === 0 ? value : '';
                            }
                        },
                        title: {
                            display: true,
                            text: 'Quantidade de Alunos'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Anos'
                        }
                    }
                }
            }
        });

        var itemsPerPage = 5;
        var totalPages = Math.ceil(years.length / itemsPerPage);
        var currentPage = 1;

        function calculateStepSize(maxValue) {
            if (maxValue > 1000) {
                return 1000;
            } else if (maxValue > 500) {
                return 500;
            } else if (maxValue > 100) {
                return 100;
            } else {
                return 50;
            }
        }

        function updateChart() {
            var start = (currentPage - 1) * itemsPerPage;
            var end = start + itemsPerPage;

            studentsLastYearsChart.data.labels = years.slice(start, end);
            studentsLastYearsChart.data.datasets[0].data = studentsLastYears.slice(start, end);
            studentsLastYearsChart.update();
        }

        function updatePagination() {
            $('#pagination').empty();

            var startPage = Math.max(1, currentPage - 2);
            var endPage = Math.min(totalPages, startPage + 4);

            for (var i = startPage; i <= endPage; i++) {
                var liClass = i === currentPage ? 'page-item active' : 'page-item';
                liClass += i % 5 === 0 ? ' border' : '';
                var li = $('<li class="' + liClass + '"><a class="page-link btn-pagination" href="#">' + i + '</a></li>');
                li.click(function() {
                    currentPage = parseInt($(this).text());
                    updateChart();
                    updatePagination();
                });
                $('#pagination').append(li);
            }

            if (currentPage > 1) {
                var prevGroup = $('<li class="page-item"><a class="page-link btn-pagination" href="#"><<</a></li>');
                prevGroup.click(function() {
                    currentPage = Math.max(1, currentPage - 5);
                    updateChart();
                    updatePagination();
                });
                $('#pagination').prepend(prevGroup);
            }

            if (currentPage < totalPages) {
                var nextGroup = $('<li class="page-item"><a class="page-link btn-pagination" href="#">>></a></li>');
                nextGroup.click(function() {
                    currentPage = Math.min(totalPages, currentPage + 5);
                    updateChart();
                    updatePagination();
                });
                $('#pagination').append(nextGroup);
            }
        }

        updateChart();
        updatePagination();
    </script>

    <!-- New Bar Chart for Categories -->
    <?php
    $categories = ['Categoria A', 'Categoria B', 'Categoria AB'];
    $studentsByCategory = [
        $cnhDAO->countByCategory("A"),
        $cnhDAO->countByCategory("B"),
        $cnhDAO->countByCategory("AB")
    ];

    $categoriesJSON = json_encode($categories);
    $studentsByCategoryJSON = json_encode($studentsByCategory);
    ?>

    <div class="container">
        <div class="row">
            <p id="total-alunos-categorias" class="fs-2 text-center mt-5">Total de Alunos por Categoria</p>
            <div class="chart">
                <canvas id="studentsCategoriesChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <script>
        var categories = <?php echo $categoriesJSON; ?>;
        var studentsByCategory = <?php echo $studentsByCategoryJSON; ?>;

        var studentsCategoriesCtx = document.getElementById('studentsCategoriesChart').getContext('2d');
        var studentsCategoriesData = {
    labels: categories,
    datasets: [
        {
            label: 'Total de Alunos da Categoria A',
            data: [studentsByCategory[0], 0, 0],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        },
        {
            label: 'Total de Alunos da Categoria B',
            data: [0, studentsByCategory[1], 0],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        },
        {
            label: 'Total de Alunos da Categoria AB',
            data: [0, 0, studentsByCategory[2]],
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }
    ]
};


        var maxStudentsCategory = Math.max(...studentsByCategory);
        var stepSizeCategories = calculateStepSize(maxStudentsCategory);

        var studentsCategoriesChart = new Chart(studentsCategoriesCtx, {
            type: 'bar',
            data: studentsCategoriesData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: stepSizeCategories,
                            callback: function (value) {
                                return value % stepSizeCategories === 0 ? value : '';
                            }
                        },
                        title: {
                            display: true,
                            text: 'Quantidade de Alunos'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Categorias'
                        }
                    }
                }
            }
        });

        function calculateStepSize(maxValue) {
            if (maxValue > 1000) {
                return 1000;
            } else if (maxValue > 500) {
                return 500;
            } else if (maxValue > 100) {
                return 100;
            } else {
                return 50;
            }
        }
    </script>

    <br><br>
    <?php
    include_once('include/footer.php');
    include_once('include/scrollTop.php');
    ?>
</body>

</html>

