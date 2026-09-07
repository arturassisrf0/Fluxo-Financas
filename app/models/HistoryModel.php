<?php

class HistoryModel
{
    public function getTransactions($user_id)
    {
        global $conn;
        $query = "SELECT * FROM TB_transacoes WHERE usuario_id = :usuario_id";

        try 
        {
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":usuario_id", $user_id);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$result) 
            {
                return false;
            }
            return $result;

        } catch (PDOException $e) 
        {
            error_log("erro ao listar historico: " . $e->getMessage());
            return false;
        }
    }
}

?>