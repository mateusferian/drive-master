<?php

    class Administrator
    {
        private $id;
        private $nameAdministrator;
        private $email;
        private $passwordAdministrator;
        private $registerDate;
        private $recoveryKey;

        function getIdAdministrator()
        { 
            return $this->id; 
        }

        function setIdAdministrator($id)
        { 
            $this->id = $id; 
        }

        function getNameAdministrator()
        { 
            return $this->nameAdministrator; 
        }

        function setNameAdministrator($nameAdministrator)
        { 
            $this->nameAdministrator = $nameAdministrator; 
        }

        function getEmail()
        { 
            return $this->email; 
        }

        function setEmail($email)
        { 
            $this->email = $email; 
        }

        function getPasswordAdministrator()
        { 
            return $this->passwordAdministrator; 
        }

        function setPasswordAdministrator($passwordAdministrator)
        { 
            $this->passwordAdministrator = $passwordAdministrator; 
        }

        function getRegisterDate()
        {
            return $this->registerDate;
        }

        function setRegisterDate($registerDate)
        {
            $this->registerDate = $registerDate;
        }
        
        function getRecoveryKey()
        {
            return $this->recoveryKey;
        }

        function setRecoveryKey($recoveryKey)
        {
            $this->recoveryKey = $recoveryKey;
        }
    }

?>