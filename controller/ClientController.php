<?php
    include_once "../conexao/Conexao.php";
    include_once "../model/Client.php";
    include_once "../dao/clientDAO.php";

    $client = new Client();
    $clientDAO = new clientDAO();

    $d = filter_input_array(INPUT_POST);

    if(isset($_POST['salvar'])){

        // $client->setIdClient((null));
        $client->setName(($d['name']));
        $client->setFather(($d['responsibleMale']));

        $client->setMother(($d['responsiblefeminine']));
        $client->setRg(($d['rg']));

        $client->setRgExpedition(($d['rgExpedition']));
        $client->setCpf(($d['cpf']));
        $client->setBirthDate(($d['dateOfBirth']));

        $client->setEmail(($d['email']));
        $client->setCelphone(($d['celphone']));

        $client->setTelephone(($d['telephone']));
        $client->setNaturalness(($d['naturalness']));
        $client->setAddress(($d['address']));

        $client->setNumber(($d['residentialNumber']));
        $client->setNeighborhood(($d['neighborhood']));

        $client->setUf(($d['uf']));
        $client->setActivityLocation(($d['activitylocation']));
        $client->setPhoto(($d['profilePicture']));
        $client->setRenach(($d['renach']));

        $clientDAO->create($client);

        header("Location: ../cadastro-alunos.php");
    }

    else if(isset($_POST['editar'])) {

        $client->setIdClient(($d['idclient']));
        $client->setName(($d['name']));
        $client->setFather(($d['responsibleMale']));

        $client->setMother(($d['responsiblefeminine']));
        $client->setRg(($d['rg']));

        $client->setRgExpedition(($d['rgExpedition']));
        $client->setCpf(($d['cpf']));
        $client->setBirthDate(($d['dateOfBirth']));

        $client->setEmail(($d['email']));
        $client->setCelphone(($d['celphone']));

        $client->setTelephone(($d['telephone']));
        $client->setNaturalness(($d['naturalness']));
        $client->setAddress(($d['address']));

        $client->setNumber(($d['residentialNumber']));
        $client->setNeighborhood(($d['neighborhood']));

        $client->setUf(($d['uf']));
        $client->setActivityLocation(($d['activitylocation']));
        $client->setPhoto(($d['profilePicture']));
        $client->setRenach(($d['renach']));
    
        $clientDAO->update($client);
    
        header("Location: ../controle-de-alunos.php");
    }


    else if(isset($_GET['del'])){

        $client->setIdClient($_GET['del']);

        $clientDAO->delete($client);

        header("Location: ../controle-de-alunos.php");

    } 

?>