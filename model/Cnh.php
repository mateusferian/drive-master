<?php

class Cnh
{
    private $idCnh;
    private $categoru;
    private $type;
    private $registration;
    private $medicalExam;
    private $registrationNumber;
    private $biometricUpdate;
    private $idClient;

    function getIdCnh()
    { 
        return $this->idCnh; 
    }
    
    function setIdCnh($idCnh)
    { 
        $this->idCnh = $idCnh; 
    }
 
    function getCategoru()
    { 
       return $this->categoru; 
    }

    function setcategoru($categoru)
    {    
        $this->categoru = $categoru; 
    }

    function getType()
    { 
       return $this->type; 
    }

    function setType($type)
    {    
        $this->type = $type; 
    }

    function getRegistration()
    { 
       return $this->registration; 
    }

    function setRegistration($registration)
    {    
        $this->registration = $registration; 
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
       return $this->idClient; 
    }

    function setIdClient($idClient)
    {    
        $this->idClient = $idClient; 
    }
}        
?>