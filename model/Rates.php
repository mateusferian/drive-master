<?php

class Rates
{
    private $idRates;
    private $theoretic;
    private $practice1;
    private $practice2;
    private $emissionCnh;
    private $disapprove;
    private $examA;
    private $examB;
    private $examD;
    private $idclient;

    function getIdRates()
    { 
        return $this->idRates; 
    }

    function setIdRates($idRates)
    { 
        $this->idRates = $idRates; 
    }

    function getTheoretic()
    { 
       return $this->theoretic; 
    }

    function setTheoretic($theoretic)
    {    
        $this->theoretic = $theoretic; 
    }

    function getPractice1()
    { 
        return $this->practice1; 
    }

    function setPractice1($practice1)
    { 
        $this->practice1 = $practice1; 
    }

    function getPractice2()
    { 
        return $this->practice2; 
    }

    function setPractice2($practice2)
    {    
        $this->practice2 = $practice2; 
    }

    function getEmissionCnh()
    {
        return $this->emissionCnh;
    }

    function setEmissionCnh($emissionCnh)
    {
        $this->emissionCnh = $emissionCnh;
    }

    function getDisapprove()
    {
        return $this->disapprove;
    }

    function setDisapprove($disapprove)
    {
        $this->disapprove = $disapprove;
    }

    function getExamA()
    {
        return $this->examA;
    }

    function setExamA($examA)
    {
        $this->examA = $examA;
    }

    function getExamB()
    {
        return $this->examB;
    }

    function setExamB($examB)
    {
        $this->examB = $examB;
    }

    function getExamD()
    {
        return $this->examD;
    }

    function setExamD($examD)
    {
        $this->examD = $examD;
    }

    function getIdclient()
    {
        return $this->idClient;
    }

    function setIdclient($idClient)
    {
        $this->idClient = $idClient;
    }
}

?>