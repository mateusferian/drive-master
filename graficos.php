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
</head>

<body>
    <?php
    include_once('./conexao/Conexao.php');
    include_once('./model/Client.php');
    include_once('./dao/ClientDAO.php');

    $client = new Client();
    $clientDAO = new ClientDAO();
    ?>
    <div class="container">
        <div class="row">
            <p class="fs-2 text-center mt-5">Total de alunos nos últimos anos</p>
            <div class="chart">
                <canvas id="studentsLastYearsChart" width="800" height="400"></canvas>
                <br><br>
                <nav class="pagination justify-content-center" aria-label="Page navigation example">
                    <ul class="pagination" id="pagination"></ul>
                </nav>
                <br><br>
            </div>
            <p class="fs-2 text-center mt-5">Alunos aprovados e reprovados</p>
            <div class="chart-container">
                <div class="chart">
                    <canvas id="passFailCategoriesChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <?php
    $months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'];
    $passCategoryA = [12, 15, 10, 8, 14];
    $failCategoryA = [3, 5, 2, 4, 3];
    $passCategoryB = [10, 8, 12, 9, 11];
    $failCategoryB = [4, 3, 5, 3, 4];
    $years = $clientDAO->getDistinctYearsInTable();
    $studentsLastYears = $clientDAO->countStudentsByYears($years);

    $monthsJSON = json_encode($months);
    $passCategoryAJSON = json_encode($passCategoryA);
    $failCategoryAJSON = json_encode($failCategoryA);
    $passCategoryBJSON = json_encode($passCategoryB);
    $failCategoryBJSON = json_encode($failCategoryB);
    $yearsJSON = json_encode($years);
    $studentsLastYearsJSON = json_encode($studentsLastYears);
    ?>

    <script>
        var months = <?php echo $monthsJSON; ?>;
        var passCategoryA = <?php echo $passCategoryAJSON; ?>;
        var failCategoryA = <?php echo $failCategoryAJSON; ?>;
        var passCategoryB = <?php echo $passCategoryBJSON; ?>;
        var failCategoryB = <?php echo $failCategoryBJSON; ?>;
        var years = <?php echo $yearsJSON; ?>;
        var studentsLastYears = <?php echo $studentsLastYearsJSON; ?>;

        var passFailCategoriesCtx = document.getElementById('passFailCategoriesChart').getContext('2d');
        var studentsLastYearsCtx = document.getElementById('studentsLastYearsChart').getContext('2d');

        var maxStudents = Math.max(...studentsLastYears);
        var stepSize = calculateStepSize(maxStudents);
        var normalizedStep = Math.ceil(maxStudents / stepSize) * stepSize;

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
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        var passFailCategoriesChart = new Chart(passFailCategoriesCtx, {
            type: 'bar',
            data: passFailCategoriesData
        });

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
                            callback: function (value) {
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
                return 200;
            } else if (maxValue > 500) {
                return 100;
            } else if (maxValue > 100) {
                return 20;
            } else {
                return 10;
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
                li.click(function () {
                    currentPage = parseInt($(this).text());
                    updateChart();
                    updatePagination();
                });
                $('#pagination').append(li);
            }

            if (currentPage > 1) {
                var prevGroup = $('<li class="page-item"><a class="page-link btn-pagination" href="#"><<</a></li>');
                prevGroup.click(function () {
                    currentPage = Math.max(1, currentPage - 5);
                    updateChart();
                    updatePagination();
                });
                $('#pagination').prepend(prevGroup);
            }

            if (currentPage < totalPages) {
                var nextGroup = $('<li class="page-item"><a class="page-link btn-pagination" href="#">>></a></li>');
                nextGroup.click(function () {
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

    <br><br>
    <?php
    include_once('include/footer.php');
    include_once('include/scrollTop.php');
    ?>
</body>
</html>