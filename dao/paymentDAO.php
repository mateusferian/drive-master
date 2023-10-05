<?php
    class paymentDAO
    {
        public function create(payment $payment){
            try{
                $sql = "INSERT INTO tb_payment (
                    amount, payment_form, theoretic_course, installment_date, installment_value, situation, idclient)
                    VALUES (
                    :amount, :payment_form, :'theoretic_course',:installment_date, :installment_value, :situation, :idclient)";

                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":amount", $payment->getAmount());
                $p_sql->bindValue(":payment_form", $payment->getPaymentForm());
                $p_sql->bindValue(":theoretic_course", $payment->getTheoreticCourse());
                $p_sql->bindValue(":installment_date", $payment->getInstallmentDate());
                $p_sql->bindValue(":installment_value", $payment->getInstallmentValue());
                $p_sql->bindValue(":situation", $payment->getSituation());
                $p_sql->bindValue(":idclient", $payment->getIdclient());
                return $p_sql->execute();

            } catch (Exception $e) {
                print "Erro ao Inserir Pagamento <br>" . $e . '<br>';
            }      
        }

        private function listaPaymentDAO($row) {
            $payment = new payment();
            $payment->setAmount($row['amount']);
            $payment->setPaymentForm($row['payment_form']);
            $payment->setTheoreticCourse($row['theoretic_course']);
            $payment->setInstallmentDate($row['installment_date']);
            $payment->setInstallmentValue($row['installment_value']);
            $payment->setSituation($row['situation']);
            $payment->setIdclient($row['idclient']);

            return $payment;
        }

        public function delete(payment $payment){
            try {
                $sql = "DELETE FROM tb_payment WHERE idpayment  = :idpayment ";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":idpayment ", $payment->getIdpayment ());
                return $p_sql->execute();
            } catch (Exception $e) {
                echo "Erro ao Excluir Pagamento <br> $e <br>";
            }
        }
    }