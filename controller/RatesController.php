<?php
    include_once "../conexao/Conexao.php";
    include_once "../model/Rates.php";
    include_once "../dao/RatesDAO.php";

    $rates = new Rates();
    $ratesDAO = new RatesDAO();

    $d = filter_input_array(INPUT_POST);

    if(isset($_POST['salvar'])){

        $rates->setIdRates((null));
        $rates->setTheoretic(($d['theoretical']));
        $rates->setPractice1(($d['practiceCar']));
        $rates->setPractice2(($d['practicalMotorcycle']));

        $rates->setEmissionCnh(($d['cnh']));
        $rates->setDisapprove(($d['disapprove']));
        $rates->setExamA(($d['dateExameA']));

        $rates->setExamB(($d['dateExameB']));
        $rates->setExamD(($d['dateExameD']));

        $rates->setIdClient(($d['idClient']));

        $ratesDAO->create($rates);

        header("Location: ../cadastro-alunos.php");
    }

    else if(isset($_POST['editar'])) {

        $rates->setIdRates(($d['idrates']));
        $rates->setTheoretic(($d['theoretical']));
        $rates->setPractice1(($d['practiceCar']));
        $rates->setPractice2(($d['practicalMotorcycle']));

        $rates->setEmissionCnh(($d['cnh']));
        $rates->setDisapprove(($d['disapprove']));
        $rates->setExamA(($d['dateExameA']));

        $rates->setExamB(($d['dateExameB']));
        $rates->setExamD(($d['dateExameD']));
    
        $ratesDAO->update($rates);
    
        header("Location: ../controle-de-alunos.php");
    }


    else if(isset($_GET['del'])){

        $rates->setIdRates($_GET['del']);

        $ratesDAO->delete($rates);

        header("Location: ../controle-de-alunos.php");

    } 

?>