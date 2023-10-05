<?php
    class ClientDAO
    {
        public function create(Client $client){
            try{
                $sql = "INSERT INTO tb_client (
                    idclient, name, father, mother, rg, rg_expedition, cpf, birth_date, email, celphone, telephone, naturalness, address, number, neighborhood, uf, activity_location, photo, renach)
                    VALUES (
                    :idclient, :name, :father, :mother, :rg, :rg_expedition, :cpf, :birth_date, :email, :celphone, :telephone, :naturalness, :address, :number, :neighborhood, :uf, :activity_location, :photo, :renach)";
                
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":idclient", $client->getIdClient());
                $p_sql->bindValue(":name", $client->getName());
                $p_sql->bindValue(":father", $client->getFather());
                $p_sql->bindValue(":mother", $client->getMother());
                $p_sql->bindValue(":rg", $client->getRg());
                $p_sql->bindValue(":rg_expedition", $client->getRgExpedition());
                $p_sql->bindValue(":cpf", $client->getCpf());
                $p_sql->bindValue(":birth_date", $client->getBirthDate());
                $p_sql->bindValue(":email", $client->getEmail());
                $p_sql->bindValue(":celphone", $client->getCelphone());
                $p_sql->bindValue(":telephone", $client->getTelephone());
                $p_sql->bindValue(":naturalness", $client->getNaturalness());
                $p_sql->bindValue(":address", $client->getAddress());
                $p_sql->bindValue(":number", $client->getNumber());
                $p_sql->bindValue(":neighborhood", $client->getNeighborhood());
                $p_sql->bindValue(":uf", $client->getUf());
                $p_sql->bindValue(":activity_location", $client->getActivityLocation());
                $p_sql->bindValue(":photo", $client->getPhoto());
                $p_sql->bindValue(":renach", $client->getRenach());
                
                $p_sql->execute();
                

            } catch (Exception $e) {
                print "Erro ao Inserir cnh <br>" . $e . '<br>';
            }      
        }

        private function listaCnh($row) {
            $client = new Client();
            $client->setIdClient($row['idclient']);
            $client->setName($row['name']);
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
            $client->setAddress($row['address']);
            $client->setNumber($row['number']);
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
                    name = :name,
                    father = :father,
                    mother = :mother,
                    rg = :rg,
                    rg_expedition = :rg_expedition,
                    cpf = :cpf,
                    birth_date = :birth_date,
                    email = :email,
                    celphone = :celphone,
                    telephone = :telephone,
                    naturalness = :naturalness,
                    address = :address,
                    number = :number,
                    neighborhood = :neighborhood,
                    uf = :uf,
                    activity_location = :activity_location,
                    photo = :photo,
                    renach = :renach
                    WHERE idclient = :idclient";
        
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":idclient", $client->getIdClient());
                $p_sql->bindValue(":name", $client->getName());
                $p_sql->bindValue(":father", $client->getFather());
                $p_sql->bindValue(":mother", $client->getMother());
                $p_sql->bindValue(":rg", $client->getRg());
                $p_sql->bindValue(":rg_expedition", $client->getRgExpedition());
                $p_sql->bindValue(":cpf", $client->getCpf());
                $p_sql->bindValue(":birth_date", $client->getBirthDate());
                $p_sql->bindValue(":email", $client->getEmail());
                $p_sql->bindValue(":celphone", $client->getCelphone());
                $p_sql->bindValue(":telephone", $client->getTelephone());
                $p_sql->bindValue(":naturalness", $client->getNaturalness());
                $p_sql->bindValue(":address", $client->getAddress());
                $p_sql->bindValue(":number", $client->getNumber());
                $p_sql->bindValue(":neighborhood", $client->getNeighborhood());
                $p_sql->bindValue(":uf", $client->getUf());
                $p_sql->bindValue(":activity_location", $client->getActivityLocation());
                $p_sql->bindValue(":photo", $client->getPhoto());
                $p_sql->bindValue(":renach", $client->getRenach());
        
                return $p_sql->execute();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
            }
        }
    }
?>