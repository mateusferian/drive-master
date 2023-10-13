<?php

class Cnh
{
    private $idCnh;
    private $category;
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