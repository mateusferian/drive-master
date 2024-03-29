<?php
    class ClientDAO
    {
        public function create(Client $client){
            try{
                $sql = "INSERT INTO tb_client (
                    name_client, father, mother, rg, rg_expedition, cpf, birth_date, email, celphone, telephone, naturalness, address_client, number_client, neighborhood, uf, activity_location, renach, registration_date)
                    VALUES (
                    :name_client, :responsibleMale, :responsiblefeminine, :rg, :rgExpedition, :cpf, :dateOfBirth, :email, :celphone, :telephone, :naturalness, :address_client, :residentialNumber, :neighborhood, :uf, :activitylocation, :renach, :registration_date)";
                
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
                $p_sql->bindValue(":activitylocation", $client->getActivityLocation());;
                $p_sql->bindValue(":renach", $client->getRenach());
                $p_sql->bindValue(":registration_date", $client->getRegistrationDate());
                
                $p_sql->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
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
            $client->setRenach($row['renach']);
            $client->setRegistrationDate($row['registration_date']);
        
            return $client;
        }
        
        public function delete(Client $client){
            try {
                $sql = "DELETE FROM tb_client WHERE idclient = :idclient";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":idclient", $client->getIdClient());
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

        public function countTotalClients($filtro, $cpf, $rg, $name) {
            try {
                $sql = "SELECT COUNT(*) FROM tb_client WHERE 1";
        
                if ($filtro == "opcao0" && $cpf != "") {
                    $sql .= " AND cpf = :cpf";
                } elseif ($filtro == "opcao1" && $rg != "") {
                    $sql .= " AND rg = :rg";
                } elseif ($filtro == "opcao2" && $name != "") {
                    $sql .= " AND name_client = :name_client";
                }
        
                $result = Conexao::getConexao()->prepare($sql);
        
                if ($cpf != "") {
                    $result->bindParam(':cpf', $cpf, PDO::PARAM_INT);
                } elseif ($rg != "") {
                    $result->bindParam(':rg', $rg, PDO::PARAM_INT);
                } elseif ($name != "") {
                    $result->bindParam(':name_client', $name, PDO::PARAM_STR);
                }
        
                $result->execute();
        
                return $result->fetchColumn();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar contar os clientes." . $e;
            }
        }
        
        public function filtersWithPagination($filtro, $cpf, $rg, $name, $limit_start, $results_per_page) {
            try {
                $sql = "SELECT * FROM tb_client WHERE 1";
        
                if ($filtro == "opcao0" && $cpf != "") {
                    $sql .= " AND cpf = :cpf";
                } elseif ($filtro == "opcao1" && $rg != "") {
                    $sql .= " AND rg = :rg";
                } elseif ($filtro == "opcao2" && $name != "") {
                    $sql .= " AND name_client = :name_client";
                }
        
                $sql .= " ORDER BY idclient ASC LIMIT :start, :per_page";
        
                $result = Conexao::getConexao()->prepare($sql);
        
                if ($cpf != "") {
                    $result->bindParam(':cpf', $cpf, PDO::PARAM_INT);
                } elseif ($rg != "") {
                    $result->bindParam(':rg', $rg, PDO::PARAM_INT);
                } elseif ($name != "") {
                    $result->bindParam(':name_client', $name, PDO::PARAM_STR);
                }
                
                $result->bindParam(':start', $limit_start, PDO::PARAM_INT);
                $result->bindParam(':per_page', $results_per_page, PDO::PARAM_INT);
        
                $result->execute();
        
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);
                $f_lista = array();
        
                foreach ($lista as $l) {
                    $f_lista[] = $this->clientList($l);
                }
        
                return $f_lista;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar buscar os clientes." . $e;
            }
        }

        public function filters($filtro, $cpf, $rg, $name) {
            try {
                $sql = "SELECT * FROM tb_client WHERE 1";
        
                if ($filtro == "opcao0" && $cpf != "") {
                    $sql .= " AND cpf = :cpf";
                } elseif ($filtro == "opcao1" && $rg != "") {
                    $sql .= " AND rg = :rg";
                } elseif ($filtro == "opcao2" && $name != "") {
                    $sql .= " AND name_client = :name_client";
                }
        
                $sql .= " ORDER BY idclient ASC";
        
                $result = Conexao::getConexao()->prepare($sql);
        
                if ($cpf != "") {
                    $result->bindParam(':cpf', $cpf, PDO::PARAM_INT);
                } elseif ($rg != "") {
                    $result->bindParam(':rg', $rg, PDO::PARAM_INT);
                } elseif ($name != "") {
                    $result->bindParam(':name_client', $name, PDO::PARAM_STR);
                }
        
                $result->execute();
        
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);
                $f_lista = array();
        
                foreach ($lista as $l) {
                    $f_lista[] = $this->clientList($l);
                }
        
                return $f_lista;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar buscar os clientes." . $e;
            }
        }

        
        public function lastClient() {
            try {
                $sql = "SELECT idclient, name_client FROM tb_client ORDER BY idclient DESC LIMIT 1";
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
        
        public function countStudentsByYears($years)
        {
            try {
                $placeholders = implode(',', array_fill(0, count($years), '?'));
        
                $sql = "SELECT YEAR(registration_date) as year, COALESCE(COUNT(*), 0) as total_students
                        FROM tb_client 
                        WHERE YEAR(registration_date) IN ($placeholders)
                        GROUP BY YEAR(registration_date)
                        ORDER BY year ASC";
                //ASC E DESC
        
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->execute($years);
                $results = $p_sql->fetchAll(PDO::FETCH_ASSOC);
        
                $totals = [];
                foreach ($results as $result) {
                    $totals[$result['year']] = $result['total_students'];
                }
        
                $orderedTotals = [];
                foreach ($years as $year) {
                    $orderedTotals[] = $totals[$year] ?? 0;
                }
        
                return $orderedTotals;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar contar alunos por ano: " . $e->getMessage();
                return [];
            }
        }
        
        
        public function getDistinctYearsInTable(){
            try {
                $sql = "SELECT DISTINCT YEAR(registration_date) as year FROM tb_client ORDER BY year ASC";  //ASC E DESC
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->execute();
                $results = $p_sql->fetchAll(PDO::FETCH_COLUMN);
        
                return $results;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar obter os anos na tabela: " . $e->getMessage();
                return [];
            }
        }
    }
?>