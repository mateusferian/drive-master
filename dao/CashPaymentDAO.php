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

    public function update(CashPayment $cashPayment)
    {
        try {
            $sql = "UPDATE tb_cash_payment SET
            idCashPayment = :idCashPayment,
            value_cash_payment = :value_cash_payment,
            date_cash_payment = :date_cash_payment,
            idclient = :idclient
            WHERE idCashPayment = :idCashPayment";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":idCashPayment", $cashPayment->getidCashPayment());
            $p_sql->bindValue(":value_cash_payment", $cashPayment->getValueCashPayment());
            $p_sql->bindValue(":date_cash_payment", $cashPayment->getDateCashPayment());
            $p_sql->bindValue(":idclient", $cashPayment->getIdClient());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    private function listaCashPayment($row) {
        $cashPayment = new CashPayment();
        $cashPayment->setidCashPayment($row['idCashPayment']);
        $cashPayment->setValueCashPayment($row['value_cash_payment']);
        $cashPayment->setDateCashPayment($row['date_cash_payment']);
        $cashPayment->setIdClient($row['idclient']);

        $cashPayment->setIdclient($row['idclient']);

        return $cashPayment;
    }

    public function findByClientId($idClient) {
        try {
            $sql = "SELECT * FROM tb_cash_payment WHERE idclient = :idclient";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":idclient", $idClient);
            $p_sql->execute();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);
    
            if ($row) {
                return $this->listaCashPayment($row);
            } else {
                return null;                
            }
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar buscar a taxas por ID do Cliente: " . $e;
        }
    }
}
?>