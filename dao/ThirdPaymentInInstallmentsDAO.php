<?php
class ThirdPaymentInInstallmentsDAO
{
    public function create(PaymentInInstallments $paymentInInstallments)
    {
        try {
            $sql = "INSERT INTO tbl_third_installment (
                 installment_value, installment_date, installment_mode, installment_status, idclient)
                VALUES (
                :installment_value, :installment_date, :installment_mode, :installment_status, :idclient)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":installment_value", $paymentInInstallments->getInstallmentValue());
            $p_sql->bindValue(":installment_date", $paymentInInstallments->getInstallmentDate());
            $p_sql->bindValue(":installment_mode", $paymentInInstallments->getInstallmentMode());
            $p_sql->bindValue(":installment_status", $paymentInInstallments->getInstallmentStatus());
            $p_sql->bindValue(":idclient", $paymentInInstallments->getIdClient());

            return $p_sql->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao inserir PaymentInInstallments: " . $e->getMessage());
        }
    }

    public function update(PaymentInInstallments $paymentInInstallments)
    {
        try {
            $sql = "UPDATE tbl_third_installment SET
                idPaymentInInstallments = :idPaymentInInstallments,
                installment_value = :installment_value,
                installment_date = :installment_date,
                installment_mode = :installment_mode,
                installment_status = :installment_status,
                idclient = :idclient
                WHERE idPaymentInInstallments = :idPaymentInInstallments";
    
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":idPaymentInInstallments", $paymentInInstallments->getIdPaymentInInstallments());
            $p_sql->bindValue(":installment_value", $paymentInInstallments->getInstallmentValue());
            $p_sql->bindValue(":installment_date", $paymentInInstallments->getInstallmentDate());
            $p_sql->bindValue(":installment_mode", $paymentInInstallments->getInstallmentMode());
            $p_sql->bindValue(":installment_status", $paymentInInstallments->getInstallmentStatus());
            $p_sql->bindValue(":idclient", $paymentInInstallments->getIdClient());
    
            $result = $p_sql->execute();
        } catch (Exception $e) {
             print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    private function listPaymentInInstallments($row) {
        $paymentInInstallments = new PaymentInInstallments();
        $paymentInInstallments->setIdPaymentInInstallments($row['idPaymentInInstallments']);
        $paymentInInstallments->setInstallmentValue($row['installment_value']);
        $paymentInInstallments->setInstallmentDate($row['installment_date']);
        $paymentInInstallments->setInstallmentMode($row['installment_mode']);
        $paymentInInstallments->setInstallmentStatus($row['installment_status']);
        $paymentInInstallments->setIdClient($row['idclient']);

        return $paymentInInstallments;
    }

    public function findByClientId($idClient) {
        try {
            $sql = "SELECT * FROM tbl_third_installment WHERE idclient = :idclient";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":idclient", $idClient);
            $p_sql->execute();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);
    
            if ($row) {
                return $this->listPaymentInInstallments($row);
            } else {
                return null;                
            }
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar buscar a taxas por ID do Cliente: " . $e;
        }
    }
}
?>
