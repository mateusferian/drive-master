<?php
    class ClientDAO
    {
        public function create(Client $client){
            try{
                $sql = "INSERT INTO tb_client (
                    name_client, father, mother, rg, rg_expedition, cpf, birth_date, email, celphone, telephone, naturalness, address_client, number_client, neighborhood, uf, activity_location, photo, renach)
                    VALUES (
                    :name_client, :responsibleMale, :responsiblefeminine, :rg, :rgExpedition, :cpf, :dateOfBirth, :email, :celphone, :telephone, :naturalness, :address_client, :residentialNumber, :neighborhood, :uf, :activitylocation, :profilePicture, :renach)";
                
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":name_client", $client->getName());
                $p_sql->bindValue(":responsibleMale", $client->getFather());
                $p_sql->bindValue(":responsiblefeminine", $client->getMother());
                $p_sql->bindValue(":rg", $client->getRg());
                $p_sql->bindValue(":rgExpedition", $client->getRgExpedition());
                $p_sql->bindValue(":cpf", $client->getCpf());
                $p_sql->bindValue(":dateOfBirth", $client->getBirthDate());
                $p_sql->bindValue(":email", $client->getEmail());
                $p_sql->bindValue(":celphone", $client->getCelphone());
                $p_sql->bindValue(":telephone", $client->getTelephone());
                $p_sql->bindValue(":naturalness", $client->getNaturalness());
                $p_sql->bindValue(":address_client", $client->getAddress());
                $p_sql->bindValue(":residentialNumber", $client->getNumber());
                $p_sql->bindValue(":neighborhood", $client->getNeighborhood());
                $p_sql->bindValue(":uf", $client->getUf());
                $p_sql->bindValue(":activitylocation", $client->getActivityLocation());
                $p_sql->bindValue(":profilePicture", $client->getPhoto());
                $p_sql->bindValue(":renach", $client->getRenach());
                
                $p_sql->execute();
                

            } catch (Exception $e) {
                print "Erro ao Inserir Cliente <br>" . $e . '<br>';
            }      
        }

        private function clientList($row) {
            $client = new Client();
            $client->setIdClient($row['idclient']);
            $client->setName($row['name_client']);
            $client->setFather($row['father']);
            $client->setMother($row['mother']);
            $client->setRg($row['rg']);
            $client->setRgExpedition($row['rg_expedition']);
            $client->setCpf($row['cpf']);
            $client->setBirthDate($row['birth_date']);
            $client->setEmail($row['email']);
            $client->setCelphone($row['celphone']);
            $client->setTelephone($row['telephone']);
            $client->setNaturalness($row['naturalness']);
            $client->setAddress($row['address_client']);
            $client->setNumber($row['number_client']);
            $client->setNeighborhood($row['neighborhood']);
            $client->setUf($row['uf']);
            $client->setActivityLocation($row['activity_location']);
            $client->setPhoto($row['photo']);
            $client->setRenach($row['renach']);
        
            return $client;
        }
        
        public function delete(Client $client){
            try {
                $sql = "DELETE FROM tb_client WHERE idclient  = :idclient ";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":idclient ", $client->getIdClient ());
                return $p_sql->execute();
            } catch (Exception $e) {
                echo "Erro ao Excluir cnh <br> $e <br>";
            }
        }

        public function update(Client $client)
        {
            try {
                $sql = "UPDATE tb_client SET
                    idclient = :idclient,
                    name_client = :name_client,
                    father = :responsibleMale,
                    mother = :responsiblefeminine,
                    rg = :rg,
                    rg_expedition = :rgExpedition,
                    cpf = :cpf,
                    birth_date = :dateOfBirth,
                    email = :email,
                    celphone = :celphone,
                    telephone = :telephone,
                    naturalness = :naturalness,
                    address_client = :address_client,
                    number_client = :residentialNumber,
                    neighborhood = :neighborhood,
                    uf = :uf,
                    activity_location = :activitylocation,
                    photo = :profilePicture,
                    renach = :renach
                    WHERE idclient = :idclient";
        
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":idclient", $client->getIdClient());
                $p_sql->bindValue(":name_client", $client->getName());
                $p_sql->bindValue(":responsibleMale", $client->getFather());
                $p_sql->bindValue(":responsiblefeminine", $client->getMother());
                $p_sql->bindValue(":rg", $client->getRg());
                $p_sql->bindValue(":rgExpedition", $client->getRgExpedition());
                $p_sql->bindValue(":cpf", $client->getCpf());
                $p_sql->bindValue(":dateOfBirth", $client->getBirthDate());
                $p_sql->bindValue(":email", $client->getEmail());
                $p_sql->bindValue(":celphone", $client->getCelphone());
                $p_sql->bindValue(":telephone", $client->getTelephone());
                $p_sql->bindValue(":naturalness", $client->getNaturalness());
                $p_sql->bindValue(":address_client", $client->getAddress());
                $p_sql->bindValue(":residentialNumber", $client->getNumber());
                $p_sql->bindValue(":neighborhood", $client->getNeighborhood());
                $p_sql->bindValue(":uf", $client->getUf());
                $p_sql->bindValue(":activitylocation", $client->getActivityLocation());
                $p_sql->bindValue(":profilePicture", $client->getPhoto());
                $p_sql->bindValue(":renach", $client->getRenach());
        
                return $p_sql->execute();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
            }
        }

        public function read() {
            try {
                $sql = "SELECT * FROM tb_client ORDER BY idclient ASC";
                $result = Conexao::getConexao()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);
                $f_lista = array();
                foreach ($lista as $l) {
                    $f_lista[] = $this->clientList($l);
                } 
                return $f_lista;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar Buscar Todos." . $e;
            }
        }

        public function lastClient() {
            try {
                $sql = "SELECT idclient FROM tb_client ORDER BY idclient DESC LIMIT 1";
                $result = Conexao::getConexao()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);
                $f_lista = array();
                foreach ($lista as $l) {
                    $f_lista[] = $this->clientList($l);
                } 
                return $f_lista;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar Buscar Todos." . $e;
            }
        }

        public function findById($idClient) {
            try {
                $sql = "SELECT * FROM tb_client WHERE idclient = :idclient";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":idclient", $idClient);
                $p_sql->execute();
                $row = $p_sql->fetch(PDO::FETCH_ASSOC);
        
                if ($row) {
                    return $this->clientList($row);
                } else {
                    return null; // Cliente não encontrado
                }
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar Buscar Cliente por ID: " . $e;
            }
        }
        

    }
?>