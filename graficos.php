<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficos em PHP</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .chart {
            width: 48%; /* Ajuste conforme necessário para o espaçamento desejado entre os gráficos */
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="chart-container">
    <!-- Gráfico 1 -->
    <div class="chart">
        <canvas id="totalStudentsChart" width="400" height="200"></canvas>
    </div>

    <!-- Gráfico 2 -->
    <div class="chart">
        <canvas id="passFailCategoriesChart" width="400" height="200"></canvas>
    </div>
</div>

<!-- Gráfico 3 (maior) -->
<div class="chart">
    <canvas id="studentsLastYearsChart" width="800" height="400"></canvas>
</div>

<?php
$months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'];
$totalStudents = [150, 155, 160, 158, 165];
$passCategoryA = [12, 15, 10, 8, 14];
$passCategoryB = [10, 8, 12, 9, 11];
$failCategoryA = [3, 5, 2, 4, 3];
$failCategoryB = [4, 3, 5, 3, 4];
$years = ['2018', '2019', '2020', '2021', '2022'];
$studentsLastYears = [120, 140, 155, 160, 175];

$monthsJSON = json_encode($months);
$totalStudentsJSON = json_encode($totalStudents);
$passCategoryAJSON = json_encode($passCategoryA);
$failCategoryAJSON = json_encode($failCategoryA);
$passCategoryBJSON = json_encode($passCategoryB);
$failCategoryBJSON = json_encode($failCategoryB);
$yearsJSON = json_encode($years);
$studentsLastYearsJSON = json_encode($studentsLastYears);
?>

<script>
    var months = <?php echo $monthsJSON; ?>;
    var totalStudents = <?php echo $totalStudentsJSON; ?>;
    var passCategoryA = <?php echo $passCategoryAJSON; ?>;
    var failCategoryA = <?php echo $failCategoryAJSON; ?>;
    var passCategoryB = <?php echo $passCategoryBJSON; ?>;
    var failCategoryB = <?php echo $failCategoryBJSON; ?>;
    var years = <?php echo $yearsJSON; ?>;
    var studentsLastYears = <?php echo $studentsLastYearsJSON; ?>;

    var totalStudentsCtx = document.getElementById('totalStudentsChart').getContext('2d');
    var passFailCategoriesCtx = document.getElementById('passFailCategoriesChart').getContext('2d');
    var studentsLastYearsCtx = document.getElementById('studentsLastYearsChart').getContext('2d');

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

</body>
</html>
