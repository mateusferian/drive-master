<?php
    class CnhDAO
    {
        public function create(Cnh $cnh){
            try{
                $sql = "INSERT INTO tb_cnh (
                     category, type_cnh, medical_exam, registration_number, biometric_update, idclient)
                    VALUES (
                    :category, :type_cnh,  :medical_exam, :registration_number, :biometric_update, :idclient)";
    
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":category", $cnh->getCategory());
                $p_sql->bindValue(":type_cnh", $cnh->getType());
                $p_sql->bindValue(":medical_exam", $cnh->getMedicalExam());
                $p_sql->bindValue(":registration_number", $cnh->getRegistrationNumber());
                $p_sql->bindValue(":biometric_update", $cnh->getBiometricUpdate());
                $p_sql->bindValue(":idclient", $cnh->getIdClient());

                return $p_sql->execute();

            } catch (Exception $e) {
                print "Erro ao Inserir CNH <br>" . $e . '<br>';
            }      
        }

        private function listaCnh($row) {
            $cnh = new Cnh();
            $cnh->setIdCnh($row['idcnh']);
            $cnh->setCategory($row['category']);
            $cnh->setType($row['type_cnh']);
            $cnh->setMedicalExam($row['medical_exam']);
            $cnh->setRegistrationNumber($row['registration_number']);
            $cnh->setBiometricUpdate($row['biometric_update']);
            $cnh->setIdClient($row['idclient']);
            
            return $cnh;
        }
        
        public function delete(Cnh $cnh){
            try {
                $sql = "DELETE FROM tb_cnh WHERE idclient  = :idclient ";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":idclient ", $cnh->getIdClient ());
                return $p_sql->execute();
            } catch (Exception $e) {
                echo "Erro ao Excluir cnh <br> $e <br>";
            }
        }

        public function update(Cnh $cnh)
        {
            try {
                $sql = "UPDATE tb_cnh SET

                    idcnh = :idcnh,
                    category = :category,
                    type_cnh = :type_cnh,
                    medical_exam = :medical_exam,
                    registration_number = :registration_number,
                    biometric_update = :biometric_update,
                    idclient = :idclient
                    WHERE idcnh = :idcnh";

        $p_sql = Conexao::getConexao()->prepare($sql);
        $p_sql->bindValue(":idcnh", $cnh->getIdCnh());
        $p_sql->bindValue(":category", $cnh->getCategory());
        $p_sql->bindValue(":type_cnh", $cnh->getType());
        $p_sql->bindValue(":medical_exam", $cnh->getMedicalExam());
        $p_sql->bindValue(":registration_number", $cnh->getRegistrationNumber());
        $p_sql->bindValue(":biometric_update", $cnh->getBiometricUpdate());
        $p_sql->bindValue(":idclient", $cnh->getIdClient());

            return $p_sql->execute();
            } catch (Exception $e) {
                 print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
            }
        }

        public function findByClientId($idClient) {
            try {
                $sql = "SELECT * FROM tb_cnh WHERE idclient = :idclient";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":idclient", $idClient);
                $p_sql->execute();
                $row = $p_sql->fetch(PDO::FETCH_ASSOC);
        
                if ($row) {
                    return $this->listaCnh($row);
                } else {
                    return null;
                }
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar buscar a CNH por ID do Cliente: " . $e;
            }
        }

        public function countByCategory($category) {
            try {
                $sql = "SELECT COUNT(*) as total FROM tb_cnh WHERE category = :category";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":category", $category);
                $p_sql->execute();
                $result = $p_sql->fetch(PDO::FETCH_ASSOC);
        
                return isset($result['total']) ? [(int) $result['total']] : [0];
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar contar as CNHs por categoria: " . $e;
                return [0];
            }
        }
    
    }
?>