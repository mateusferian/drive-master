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
    
    public function getUserByEmail($email) {
        try {
            $sql = "SELECT * FROM tb_administrator WHERE email = :email";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":email", $email);
            $p_sql->execute();
    
            return $p_sql->fetch(PDO::FETCH_ASSOC);
    
        } catch (Exception $e) {
            print "Erro ao obter usuário por email <br>" . $e . '<br>';
            return false;
        }
    }
    
    public function updateRecoveryKey($idAdministrator, $recoveryKey) {
        try {
            $sql = "UPDATE tb_administrator 
                    SET recuperar_senha = :recuperar_senha 
                    WHERE idAdministrator = :idAdministrator 
                    LIMIT 1";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindParam(':recuperar_senha', $recoveryKey, PDO::PARAM_STR);
            $p_sql->bindParam(':idAdministrator', $idAdministrator, PDO::PARAM_INT);
            $p_sql->execute();
    
            return true;
    
        } catch (Exception $e) {
            print "Erro ao atualizar a chave de recuperação <br>" . $e . '<br>';
            return false;
        }
    }
    
}