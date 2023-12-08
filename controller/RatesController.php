<?php
    include_once "../conexao/Conexao.php";
    include_once "../model/Rates.php";
    include_once "../dao/RatesDAO.php";

    $rates = new Rates();
    $ratesDAO = new RatesDAO();

    $d = filter_input_array(INPUT_POST);

    if(isset($_POST['save'])){

        $rates->setTheoretic(($d['theoretic']));
        $rates->setPractice1(($d['practice1']));
        $rates->setPractice2(($d['practice2']));

        $rates->setEmissionCnh(($d['emission_rates']));
        $rates->setDisapprove(($d['disapprove']));
        $rates->setExamA(($d['exam_a']));

        $rates->setExamB(($d['exam_b']));
        $rates->setExamD(($d['exam_d']));

        $rates->setIdClient(($d['idclient']));

        $ratesDAO->create($rates);

        header("Location: ../cadastro-de-pagamento.php");
    }

    else if(isset($_POST['edit'])) {

        $rates->setIdRates(($d['idrates']));
        $rates->setTheoretic(($d['theoretic']));
        $rates->setPractice1(($d['practice1']));

        $rates->setPractice2(($d['practice2']));
        $rates->setEmissionCnh(($d['emission_rates']));
        $rates->setDisapprove(($d['disapprove']));

        $rates->setExamA(($d['exam_a']));
        $rates->setExamB(($d['exam_b']));
        $rates->setExamD(($d['exam_d']));

        $rates->setIdClient(($d['idclient']));
    
        $ratesDAO->update($rates);

        $idclient = $rates->getIdClient();

        header("Location: PaymentController.php?al=$idclient");
    }


    else if(isset($_GET['del'])){

        $rates->setIdRates($_GET['del']);

        $ratesDAO->delete($rates);

        header("Location: ../controle-de-alunos.php");

    } 

?>