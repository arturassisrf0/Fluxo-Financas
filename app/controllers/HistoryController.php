<?php

require_once("HistoryModel.php");

class HistoryController
{
    public function getHistory()
    {
        $user_id = $_SESSION["user_id"] ?? "";

	    if (empty($user_id))
       	{
            return "Usuário não autenticado";
        }

        $model = new HistoryModel();

        $history = $model->getTransactions($user_id);

	    if (!$history)
       	{
            return "Erro ao tentar listar histórico";
        }

        return $history;
    }
}

?>
