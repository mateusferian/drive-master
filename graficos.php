<!DOCTYPE html>
<html lang="en">
<?php
include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
include_once('include/carousel.php');
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
</body>

</html>