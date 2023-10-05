<?php
    class CnhDAO
    {
        public function create(Cnh $cnh){
            try{
                $sql = "INSERT INTO tb_cnh (
                     categoru, type, registration, medical_exam, registration_number, biometric_update, idclient)
                    VALUES (
                    :categoru, :type, :registration, :medical_exam, :registration_number, :biometric_update, :idclient)";
    
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":categoru", $rates->getCategoru());
                $p_sql->bindValue(":type", $rates->getType());
                $p_sql->bindValue(":registration", $rates->getRegistration());
                $p_sql->bindValue(":medical_exam", $rates->getMedicalExam());
                $p_sql->bindValue(":registration_number", $rates->getRegistrationNumber());
                $p_sql->bindValue(":biometric_update", $rates->getBiometricUpdate());
                $p_sql->bindValue(":idclient", $rates->getIdClient());

                return $p_sql->execute();

            } catch (Exception $e) {
                print "Erro ao Inserir taxas <br>" . $e . '<br>';
            }      
        }

        private function listaCnh($row) {
            $rates = new Cnh();
            $rates->setIdCnh($row['idcnh']);
            $rates->setCategoru($row['categoru']);
            $rates->setType($row['type']);
            $rates->setRegistration($row['registration']);
            $rates->setMedicalExam($row['medical_exam']);
            $rates->setRegistrationNumber($row['registration_number']);
            $rates->setBiometricUpdate($row['biometric_update']);
            $rates->setIdClient($row['idclient']);
            
            return $rates;
        }
        
        public function delete(Cnh $client){
            try {
                $sql = "DELETE FROM tb_client WHERE idclient  = :idclient ";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":idclient ", $client->getIdClient ());
                return $p_sql->execute();
            } catch (Exception $e) {
                echo "Erro ao Excluir cnh <br> $e <br>";
            }
        }

        public function update(Cnh $rates)
        {
            try {
                $sql = "UPDATE tb_cnh SET

                    idcnh = :idcnh,
                    categoru = :categoru,
                    type = :type,
                    registration = :registration,
                    medical_exam = :medical_exam,
                    registration_number = :registration_number,
                    biometric_update = :biometric_update,
                    idclient = :idclient
                    WHERE idcnh = :idcnh";

        $p_sql = Conexao::getConexao()->prepare($sql);
        $p_sql->bindValue(":idcnh", $rates->getIdCnh());
        $p_sql->bindValue(":categoru", $rates->getCategoru());
        $p_sql->bindValue(":type", $rates->getType());
        $p_sql->bindValue(":registration", $rates->getRegistration());
        $p_sql->bindValue(":medical_exam", $rates->getMedicalExam());
        $p_sql->bindValue(":registration_number", $rates->getRegistrationNumber());
        $p_sql->bindValue(":biometric_update", $rates->getBiometricUpdate());
        $p_sql->bindValue(":idclient", $rates->getIdClient());

            return $p_sql->execute();
            } catch (Exception $e) {
                 print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
            }
        }
    }
?>