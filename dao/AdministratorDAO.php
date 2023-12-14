<?php
    class administratorDAO
    {
        public function create(Administrator $administrator){
            try{
                $sql = "INSERT INTO tb_administrator (
                    name_administrator, email, password_administrator, register_date)
                    VALUES (
                     :name_administrator, :email, :password_administrator, :register_date)";                

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
        
        private function listaAdministrator($row) {
            $administrator = new Administrator();
            $administrator->setIdAdministrator($row['idAdministrator']);
            $administrator->setNameAdministrator($row['name_administrator']);
            $administrator->setEmail($row['email']);
            $administrator->setPasswordAdministrator($row['password_administrator']);
            $administrator->setRegisterDate($row['register_date']);
            $administrator->setRecoveryKey($row['recuperar_senha']);

            return $administrator;
        }

        public function delete(Administrator $administrator){
            try {
                $sql = "DELETE FROM tb_administrator WHERE idAdministrator  = :idAdministrator ";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":idAdministrator ", $administrator->getIdAdministrator ());
                return $p_sql->execute();
            } catch (Exception $e) {
                echo "Erro ao Excluir Administrador <br> $e <br>";
            }
        }

        public function update(Administrator $administrator)
        {
            try {
                $sql = "UPDATE tb_administrator set
                    
                    idAdministrator=:idAdministrator,
                    name_administrator=:name_administrator,
                    email=:email,
                    password_administrator=:password_administrator,
                    register_date=:register_date,
                                    
                      WHERE idAdministrator = :idAdministrator";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":idAdministrator", $administrator->getIdAdministrator());
                $p_sql->bindValue(":name_administrator", $administrator->getNameAdministrator());
                $p_sql->bindValue(":email", $administrator->getEmail());
                $p_sql->bindValue(":password_administrator", $administrator->getPasswordAdministrator());
                $p_sql->bindValue(":register_date", $administrator->getRegisterDate());

                return $p_sql->execute();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
            }
    }

    public function countByEmail($email) {
        try {
            $sql = "SELECT COUNT(*) AS count FROM tb_administrator WHERE email = :email";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":email", $email);
            $p_sql->execute();
    
            return (int) $p_sql->fetchColumn();
    
        } catch (Exception $e) {
            print "Erro ao contar administradores por email <br>" . $e . '<br>';
            return 0;
        }
    }
    
    public function findByEmail($email) {
        try {
            $sql = "SELECT * FROM tb_administrator WHERE email = :email";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":email", $email);
            $p_sql->execute();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);
    
            if ($row) {
                return $this->listaAdministrator($row);
            } else {
                return null;
            }
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Cliente por ID: " . $e;
        }
    }

    public function countByPasswordKey($key) {
        try {
            $sql = "SELECT COUNT(*) AS count FROM tb_administrator WHERE recover_password = :recover_password";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":recover_password", $key);
            $p_sql->execute();
    
            return (int) $p_sql->fetchColumn();
    
        } catch (Exception $e) {
            print "Erro ao contar administradores por email <br>" . $e . '<br>';
            return 0;
        }
    }
    
    public function findByPasswordKey($key) {
        try {
            $sql = "SELECT * FROM tb_administrator WHERE recover_password = :recover_password";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":recover_password", $key);
            $p_sql->execute();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);
    
            if ($row) {
                return $this->listaAdministrator($row);
            } else {
                return null;
            }
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Cliente por ID: " . $e;
        }
    }

    public function teste($idAdministrator, $userPassword) {

        $hash = password_hash(($userPassword), PASSWORD_DEFAULT);
        $recoveryKey = null;

        try {
            $sql = "UPDATE tb_administrator 
                    SET password_administrator = :password_administrator,
                    recover_password = :recover_password 
                    WHERE idAdministrator = :idAdministrator 
                    LIMIT 1";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindParam(':password_administrator', $hash, PDO::PARAM_STR);
            $p_sql->bindParam(':recover_password', $recoveryKey);
            $p_sql->bindParam(':idAdministrator', $idAdministrator, PDO::PARAM_INT);
            $p_sql->execute();
    
            return true;
    
        } catch (Exception $e) {
            print "Erro ao atualizar a chave de recuperação <br>" . $e . '<br>';
            return false;
        }
    }


    public function updateRecoveryKey($idAdministrator, $recoveryKey) {
        
        try {
            $sql = "UPDATE tb_administrator 
                    SET recover_password = :recover_password 
                    WHERE idAdministrator = :idAdministrator 
                    LIMIT 1";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindParam(':recover_password', $recoveryKey, PDO::PARAM_STR);
            $p_sql->bindParam(':idAdministrator', $idAdministrator, PDO::PARAM_INT);
            $p_sql->execute();
    
            return true;
    
        } catch (Exception $e) {
            print "Erro ao atualizar a chave de recuperação <br>" . $e . '<br>';
            return false;
        }
    }
    
}