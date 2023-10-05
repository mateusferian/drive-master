<?php
    class administratorDAO
    {
        public function create(administrator $administrator){
            try{
                $sql = "INSERT INTO tb_administrator (
                    name_administrator, email,password_administrator, register_date)
                    VALUES (
                    :name_administrator, :email, :'password_administrator', :register_date,)";

                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":name_administrator", $administrator->getNameAdministrator());
                $p_sql->bindValue(":email", $administrator->getEmail());
                $p_sql->bindValue(":password_administrator", $administrator->getPasswordAdministrator());
                $p_sql->bindValue(":register_date", $administrator->getRegisterDate());
                return $p_sql->execute();

            } catch (Exception $e) {
                print "Erro ao Inserir administrador <br>" . $e . '<br>';
            }      
        }

        private function listaAdministratorDAO($row) {
            $administrator = new administrator();
            $administrator->setAdministrator($row['idAdministrator']);
            $administrator->setNameAdministrator($row['name_administrator']);
            $administrator->setEmail($row['email']);
            $administrator->setPasswordAdministrator($row['password_administrator']);
            $administrator->setRegisterDate($row['register_date']);

            return $administrator;
        }

        public function delete(administrator $administrator){
            try {
                $sql = "DELETE FROM tb_administrator WHERE idAdministrator  = :idAdministrator ";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":idAdministrator ", $administrator->getIdAdministrator ());
                return $p_sql->execute();
            } catch (Exception $e) {
                echo "Erro ao Excluir Administrador <br> $e <br>";
            }
        }
    }