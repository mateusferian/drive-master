<?php

class Payment
{
    private $idpayment;
    private $amount;
    private $paymentForm;
    private $theoreticCourse;
    private $installmentDate;
    private $installmentValue;
    private $situation;
    private $idclient;

    function getIdpayment()
    { 
        return $this->idpayment; 
    }

    function setIdpayment($idpayment)
    { 
        $this->idpayment = $idpayment; 
    }

    function getAmount()
    { 
       return $this->amount; 
    }

    function setAmount($amount)
    {    
        $this->amount = $amount; 
    }

    function getPaymentForm()
    { 
        return $this->paymentForm; 
    }

    function setPaymentForm($paymentForm)
    { 
        $this->paymentForm = $paymentForm; 
    }

    function getTheoreticCourse()
    { 
        return $this->theoreticCourse; 
    }

    function setTheoreticCourse($theoreticCourse)
    {    
        $this->theoreticCourse = $theoreticCourse; 
    }

    function getInstallmentDate()
    {
        return $this->installmentDate;
    }

    function setInstallmentDate($installmentDate)
    {
        $this->installmentDate = $installmentDate;
    }

    function getInstallmentValue()
    {
        return $this->installmentValue;
    }

    function setInstallmentValue($installmentValue)
    {
        $this->installmentValue = $installmentValue;
    }

    function getSituation()
    {
        return $this->situation;
    }

    function setSituation($situation)
    {
        $this->situation = $situation;
    }

    function getIdclient()
    {
        return $this->idclient;
    }

    function setIdclient($idclient)
    {
        $this->idclient = $idclient;
    }
}

?>