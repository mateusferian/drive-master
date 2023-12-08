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

    public function update(CourseOnSight $courseOnSight)
    {
        try {
            $sql = "UPDATE tb_course_on_sight SET

                idCourseOnSight = :idCourseOnSight,
                value_course_on_sight = :value_course_on_sight,
                date_course_on_sight = :date_course_on_sight,
                idclient = :idclient
                WHERE idCourseOnSight = :idCourseOnSight";

    $p_sql = Conexao::getConexao()->prepare($sql);
    $p_sql->bindValue(":idCourseOnSight", $courseOnSight->getidCourseOnSight());
    $p_sql->bindValue(":value_course_on_sight", $courseOnSight->getValueCourseOnSight());
    $p_sql->bindValue(":date_course_on_sight", $courseOnSight->getDateCourseOnSight());
    $p_sql->bindValue(":idclient", $courseOnSight->getIdClient());

        return $p_sql->execute();
        } catch (Exception $e) {
             print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    private function listaCourseOnSight($row) {
        $courseOnSight = new CourseOnSight();
        $courseOnSight->setidCourseOnSight($row['idCourseOnSight']);
        $courseOnSight->setValueCourseOnSight($row['value_course_on_sight']);
        $courseOnSight->setDateCourseOnSight($row['date_course_on_sight']);
        $courseOnSight->setIdClient($row['idclient']);

        $courseOnSight->setIdclient($row['idclient']);

        return $courseOnSight;
    }

    public function findByClientId($idClient) {
        try {
            $sql = "SELECT * FROM tb_course_on_sight WHERE idclient = :idclient";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":idclient", $idClient);
            $p_sql->execute();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);
    
            if ($row) {
                return $this->listaCourseOnSight($row);
            } else {
                return null;                
            }
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar buscar a taxas por ID do Cliente: " . $e;
        }
    }
}
?>