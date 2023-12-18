<?php

class CourseOnSight
{
    private $idCourseOnSight;
    private $valueCourseOnSight;
    private $dateCourseOnSight;
    private $idclient;

    function getidCourseOnSight()
    { 
        return $this->idCourseOnSight; 
    }

    function setidCourseOnSight($idCourseOnSight)
    { 
        $this->idCourseOnSight = $idCourseOnSight; 
    }

    function getValueCourseOnSight()
    { 
        return $this->valueCourseOnSight; 
    }

    function setValueCourseOnSight($valueCourseOnSight)
    { 
        $this->valueCourseOnSight = $valueCourseOnSight; 
    }

    function getDateCourseOnSight()
    { 
        return $this->dateCourseOnSight; 
    }

    function setDateCourseOnSight($dateCourseOnSight)
    { 
        $this->dateCourseOnSight = $dateCourseOnSight; 
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
