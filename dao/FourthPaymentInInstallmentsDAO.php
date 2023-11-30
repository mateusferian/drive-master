<?php
class FourthPaymentInInstallmentsDAO
{
    public function create(PaymentInInstallments $paymentInInstallments)
    {
        try {
            $sql = "INSERT INTO tbl_fourth_installment (
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
}
?>
