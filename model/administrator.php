<?php

    class administrator
    {
        private $id;
        private $name;
        private $email;
        private $password;
        private $type;
        private $registerDate;

        function getId()
        { 
            return $this->id; 
        }

        function setId($id)
        { 
            $this->id = $id; 
        }

        function getName()
        { 
            return $this->name; 
        }

        function setName($name)
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

        function getPassword()
        { 
            return $this->password; 
        }

        function setPassword($password)
        { 
            $this->password = $password; 
        }

        function getType()
        { 
            return $this->type; 
        }

        function setType($type)
        { 
            $this->type = $type; 
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