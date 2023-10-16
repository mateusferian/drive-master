<!DOCTYPE html>
<html lang="en">
<?php
include_once('include/header.php');
include_once('include/topbar.php');
include_once('include/navbar.php');
include_once('./conexao/Conexao.php');
include_once('./model/Client.php');
include_once('./dao/ClientDAO.php');

$client = new Client();
$clientDAO = new ClientDAO();
?>
<body>
        <main>
        <?php
    if (isset($_GET["consult"])) {
        $idClient = $_GET["consult"];
        $client = $clientDAO->findById($idClient); 
        if ($client) {
    ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h4 class="text-center font-weight-light my-4">
                                    <span class="h3">Dados do Aluno</span>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 mt-3">
                                        <label for="name" class="form-label">Nome de Aluno:</label>
                                        <p class='form-control'><?php echo $client->getName(); ?></p>
                                    </div>

                                    <div class="col-sm-6 mt-3">
                                        <label for="name" class="form-label">Nome de Aluno:</label>
                                        <?php
                                        $getEmail = $client->getEmail();
                                        echo "<p class='form-control'>$getEmail</p>";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center py-3"></div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo "Cliente não encontrado";
        }
    }
    ?>
        </main>
    <br><br>
    <?php
    include_once('include/footer.php');
    include_once('include/scrollTop.php');
    ?>
</body>

</html>
