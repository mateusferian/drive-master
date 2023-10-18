<?php
    class RatesDAO
    {
        public function create(Rates $rates){
            try{
                $sql = "INSERT INTO tb_rates (
                    theoretic, practice1, practice2, emission_cnh, disapprove, exam_a, exam_b, exam_d, idclient)
                    VALUES (
                    :theoretic, :practice1, :practice2, :emission_cnh, :disapprove, :exam_a, :exam_b, :exam_d, :idclient)";
    
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":theoretic", $rates->getTheoretic());
                $p_sql->bindValue(":practice1", $rates->getPractice1());
                $p_sql->bindValue(":practice2", $rates->getPractice2());
                $p_sql->bindValue(":emission_cnh", $rates->getEmissionCnh());
                $p_sql->bindValue(":disapprove", $rates->getDisapprove());
                $p_sql->bindValue(":exam_a", $rates->getExamA());
                $p_sql->bindValue(":exam_b", $rates->getExamB());
                $p_sql->bindValue(":exam_d", $rates->getExamD());
                $p_sql->bindValue(":idclient", $rates->getIdclient());
                return $p_sql->execute();

            } catch (Exception $e) {
                print "Erro ao Inserir taxas <br>" . $e . '<br>';
            }      
        }

        private function listaRates($row) {
            $rates = new Rates();
            $rates->setIdRates($row['idrates']);
            $rates->setTheoretic($row['theoretic']);
            $rates->setPractice1($row['practice1']);
            $rates->setPractice2($row['practice2']);
            $rates->setEmissionCnh($row['emission_cnh']);

            $rates->setDisapprove($row['disapprove']);
            $rates->setExamA($row['exam_a']);
            $rates->setExamB($row['exam_b']);

            $rates->setExamD($row['exam_d']);
            $rates->setIdclient($row['idclient']);

            return $rates;
        }

        public function delete(Rates $rates){
            try {
                $sql = "DELETE FROM tb_rates WHERE idrates  = :idrates ";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":idrates ", $rates->getIdAdministrator ());
                return $p_sql->execute();
            } catch (Exception $e) {
                echo "Erro ao Excluir taxas <br> $e <br>";
            }
        }

        public function update(Rates $rates)
        {
            try {
                $sql = "UPDATE tb_rates set
                    
                    idrates=:idrates,
                    theoretic=:theoretic,
                    practice1=:practice1,
                    practice2=:practice2,
                    emission_cnh=:emission_cnh,
                    disapprove=:disapprove,
                    exam_a=:exam_a,
                    exam_b=:exam_b,
                    exam_d=:exam_d,
                    idclient=:idclient,
                                    
                      WHERE idrates = :idrates";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":idrates", $rates->getIdRates());
                $p_sql->bindValue(":theoretic", $rates->getTheoretic());
                $p_sql->bindValue(":practice1", $rates->getPractice1());
                $p_sql->bindValue(":practice2", $rates->getPractice2());
                $p_sql->bindValue(":emission_cnh", $rates->getEmissionCnh());
                $p_sql->bindValue(":disapprove", $rates->getDisapprove());

                $p_sql->bindValue(":exam_a", $rates->getExamA());
                $p_sql->bindValue(":exam_b", $rates->getExamB());
                $p_sql->bindValue(":exam_d", $rates->getExamD());
                $p_sql->bindValue(":idclient", $rates->getIdclient());

                return $p_sql->execute();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
            }
    }

    public function findByClientId($idClient) {
        try {
            $sql = "SELECT * FROM tb_rates WHERE idclient = :idclient";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":idclient", $idClient);
            $p_sql->execute();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);
    
            if ($row) {
                return $this->listaRates($row);
            } else {
                return null;                
            }
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar buscar a taxas por ID do Cliente: " . $e;
        }
    }
    
    }
    ?>