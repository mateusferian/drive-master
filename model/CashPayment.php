<?php

class CashPayment
{
    private $idCashPayment;
    private $valueCashPayment;
    private $dateCashPayment;
    private $idclient;

    function getidCashPayment()
    { 
        return $this->idCashPayment; 
    }

    function setidCashPayment($idCashPayment)
    { 
        $this->idCashPayment = $idCashPayment; 
    }

    function getValueCashPayment()
    { 
        return $this->valueCashPayment; 
    }

    function setValueCashPayment($valueCashPayment)
    { 
        $this->valueCashPayment = $valueCashPayment; 
    }

    function getDateCashPayment()
    { 
        return $this->dateCashPayment; 
    }

    function setDateCashPayment($dateCashPayment)
    { 
        $this->dateCashPayment = $dateCashPayment; 
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
