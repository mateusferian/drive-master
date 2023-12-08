<?php
    include_once "../conexao/Conexao.php";
    include_once "../model/CourseOnSight.php";
    include_once "../dao/CourseOnSightDAO.php";

    $courseOnSight = new CourseOnSight();
    $courseOnSightDAO = new CourseOnSightDAO();

    $d = filter_input_array(INPUT_POST);

    if(isset($_POST['save'])){

        $courseOnSight->setValueCourseOnSight(($d['value_course_on_sight']));
        $courseOnSight->setDateCourseOnSight(($d['date_course_on_sight']));
        $courseOnSight->setIdClient(($d['idclient']));
        $courseOnSightDAO->create($courseOnSight);

        header("Location: ../cadastro-de-taxa.php");
    }

    if(isset($_POST['edit'])){

        $courseOnSight->setidCourseOnSight(($d['idcourseOnSight']));
        $courseOnSight->setValueCourseOnSight(($d['value_course_on_sight']));
        $courseOnSight->setDateCourseOnSight(($d['date_course_on_sight']));
        $courseOnSight->setIdClient(($d['idclient']));

        $courseOnSightDAO->update($courseOnSight);

        $idClient = $courseOnSight->getIdClient();
        header("Location: ../formulario-de-consulta.php?aluno-alterado=" . $idClient);
    }
?>