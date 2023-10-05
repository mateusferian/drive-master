<?php

    class administrator
    {
        private $id;
        private $name;
        private $email;
        private $passwordAdministrator;
        private $registerDate;

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
            return $this->name; 
        }

        function setNameAdministrator($name)
        { 
            $this->name = $name; 
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
            return $this->password; 
        }

        function setPasswordAdministrator($password)
        { 
            $this->password = $password; 
        }

        function getRegisterDate()
        {
            return $this->registerDate;
        }

        function setRegisterDate($registerDate)
        {
            $this->registerDate = $registerDate;
        }
        
    }

?>