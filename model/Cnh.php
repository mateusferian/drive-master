<?php

    class Cnh
    {
        private $idCnh;
        private $category;
        private $type;
        private $medicalExam;
        private $registrationNumber;
        private $biometricUpdate;
        private $idclient;

        function getIdCnh()
        { 
            return $this->idCnh; 
        }
        
        function setIdCnh($idCnh)
        { 
            $this->idCnh = $idCnh; 
        }
    
        function getCategory()
        { 
        return $this->category; 
        }

        function setCategory($category)
        {    
            $this->category = $category; 
        }

        function getType()
        { 
        return $this->type; 
        }

        function setType($type)
        {    
            $this->type = $type; 
        } 

        function getMedicalExam()
        { 
        return $this->medicalExam; 
        }

        function setMedicalExam($medicalExam)
        {    
            $this->medicalExam = $medicalExam; 
        }   
        
        function getRegistrationNumber()
        { 
        return $this->registrationNumber; 
        }

        function setRegistrationNumber($registrationNumber)
        {    
            $this->registrationNumber = $registrationNumber; 
        }       

        function getBiometricUpdate()
        { 
        return $this->biometricUpdate; 
        }

        function setBiometricUpdate($biometricUpdate)
        {    
            $this->biometricUpdate = $biometricUpdate; 
        }
        
        function getIdClient()
        { 
        return $this->idclient; 
        }

        function setIdClient($idclient)
        {    
            $this->idclient = $idclient; 
        }
    }  

?>