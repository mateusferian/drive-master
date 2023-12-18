<?php
    include_once "../conexao/Conexao.php";
    include_once "../model/Client.php";
    include_once "../dao/ClientDAO.php";

    $client = new Client();
    $clientDAO = new ClientDAO();

    $d = filter_input_array(INPUT_POST);

    if(isset($_POST['save'])){

        $client->setName(($d['name_client']));
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
        $client->setAddress(($d['address_client']));

        $client->setNumber(($d['residentialNumber']));
        $client->setNeighborhood(($d['neighborhood']));

        $client->setUf(($d['uf']));
        $client->setActivityLocation(($d['activitylocation']));
        $client->setRenach(($d['renach']));
        $idclient = $client->setRegistrationDate(date("Y-m-d"));

        $clientDAO->create($client);


        header("Location: ../cadastro-de-cnh.php");
    }

    if(isset($_POST['edit'])){

        $client->setIdClient(($d['id']));
        $client->setName(($d['name_client']));
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
        $client->setAddress(($d['address_client']));

        $client->setNumber(($d['residentialNumber']));
        $client->setNeighborhood(($d['neighborhood']));

        $client->setUf(($d['uf']));
        $client->setActivityLocation(($d['activitylocation']));
        $client->setRenach(($d['renach']));

        $idclient = $client->getIdClient();
        
        $clientDAO->update($client);


        header("Location: ../alterar-cnh.php?al=$idclient");
    }



    else if(isset($_GET['del'])){

        $client->setIdClient($_GET['del']);

        $clientDAO->delete($client);

        header("Location: ../controle-de-aluno.php?deletado=0000");

    } 

?>