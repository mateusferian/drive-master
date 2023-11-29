<?php
class CourseOnSightDAO
{
    public function create(CourseOnSight $courseOnSight)
    {
        try {
            $sql = "INSERT INTO tb_course_on_sight (
                value_course_on_sight, date_course_on_sight, idclient)
                VALUES (
                :value_course_on_sight, :date_course_on_sight, :idclient)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":value_course_on_sight", $courseOnSight->getValueCourseOnSight());
            $p_sql->bindValue(":date_course_on_sight", $courseOnSight->getDateCourseOnSight());
            $p_sql->bindValue(":idclient", $courseOnSight->getIdClient());

            return $p_sql->execute();

        } catch (Exception $e) {
             throw new Exception("Erro ao inserir CashPayment: " . $e->getMessage());
        }
    }
}
?>