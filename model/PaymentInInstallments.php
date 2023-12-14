<?php

class PaymentInInstallments
{
    private $idPaymentInInstallments;
    private $installmentValue;
    private $installmentDate;
    private $installmentMode;
    private $installmentStatus;
    private $idclient;

    function getIdPaymentInInstallments()
    { 
        return $this->idPaymentInInstallments; 
    }

    function setIdPaymentInInstallments($idPaymentInInstallments)
    { 
        $this->idPaymentInInstallments = $idPaymentInInstallments; 
    }

    function getInstallmentValue()
    { 
        return $this->installmentValue; 
    }

    function setInstallmentValue($installmentValue)
    { 
        $this->installmentValue = $installmentValue; 
    }

    function getInstallmentDate()
    { 
        return $this->installmentDate; 
    }

    function setInstallmentDate($installmentDate)
    { 
        $this->installmentDate = $installmentDate; 
    }

    function getInstallmentMode()
    { 
        return $this->installmentMode; 
    }

    function setInstallmentMode($installmentMode)
    { 
        $this->installmentMode = $installmentMode; 
    }

    function getInstallmentStatus()
    { 
        return $this->installmentStatus; 
    }

    function setInstallmentStatus($installmentStatus)
    { 
        $this->installmentStatus = $installmentStatus; 
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
