<?php

class Client
{
    private $idClient;
    private $name;
    private $father;
    private $mother;
    private $rg;
    private $rgExpedition;
    private $cpf;
    private $birthDate;
    private $email;
    private $celphone;
    private $telephone;
    private $naturalness;
    private $address;
    private $number;
    private $neighborhood;
    private $uf;
    private $activityLocation;
    private $photo;
    private $renach;

    public function getIdClient()
    {
        return $this->idClient;
    }

    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getFather()
    {
        return $this->father;
    }

    public function setFather($father)
    {
        $this->father = $father;
    }

    public function getMother()
    {
        return $this->mother;
    }

    public function setMother($mother)
    {
        $this->mother = $mother;
    }

    public function getRg()
    {
        return $this->rg;
    }

    public function setRg($rg)
    {
        $this->rg = $rg;
    }

    public function getRgExpedition()
    {
        return $this->rgExpedition;
    }

    public function setRgExpedition($rgExpedition)
    {
        $this->rgExpedition = $rgExpedition;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCelphone()
    {
        return $this->celphone;
    }

    public function setCelphone($celphone)
    {
        $this->celphone = $celphone;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function getNaturalness()
    {
        return $this->naturalness;
    }

    public function setNaturalness($naturalness)
    {
        $this->naturalness = $naturalness;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    public function getActivityLocation()
    {
        return $this->activityLocation;
    }

    public function setActivityLocation($activityLocation)
    {
        $this->activityLocation = $activityLocation;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function getRenach()
    {
        return $this->renach;
    }

    public function setRenach($renach)
    {
        $this->renach = $renach;
    }
}
?>    