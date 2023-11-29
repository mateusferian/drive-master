<?php
class CashPaymentDAO
{
    public function create(CashPayment $cashPayment)
    {
        try {
            $sql = "INSERT INTO tb_cash_payment (
                value_cash_payment, date_cash_payment, idclient)
                VALUES (
                :value_cash_payment, :date_cash_payment, :idclient)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":value_cash_payment", $cashPayment->getValueCashPayment());
            $p_sql->bindValue(":date_cash_payment", $cashPayment->getDateCashPayment());
            $p_sql->bindValue(":idclient", $cashPayment->getIdClient());

            return $p_sql->execute();

        } catch (Exception $e) {
             throw new Exception("Erro ao inserir CashPayment: " . $e->getMessage());
        }
    }
}
?>