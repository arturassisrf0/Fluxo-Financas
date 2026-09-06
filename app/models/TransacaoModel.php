<?php

class TransacaoModel
{

    public function listar()
    {
        global $conn;   //falta criar o arquivo de conexao e padronizar a variavel
        $query = "SELECT * FROM TB_transacoes";

        try {
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$result) {
                return false;
            }
            return $result;

        } catch (PDOException $e) {
            error_log("erro ao listar transacoes: " . $e->getMessage());
            return false;
        }
    }

    public function buscarPorId($id)
    {
        global $conn;

        $query = "SELECT * FROM TB_transacoes WHERE id = :id";

        try {
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                return false;
            }
            return $result;

        } catch (PDOException $e) {
            error_log("erro ao buscar transacao: " . $e->getMessage());
            return false;
        }
    }
    public function buscarPorCategoria($categoria_id)
    {
        global $conn;   //falta criar o arquivo de conexao e padronizar a variavel
        $query = "SELECT * FROM TB_transacoes WHERE categoria_id = :categoria_id";

        try {
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":categoria_id", $categoria_id);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$result) {
                return false;
            }
            return $result;

        } catch (PDOException $e) {
            error_log("erro ao buscar transacoes: " . $e->getMessage());
            return false;
        }
    }

    public function criar($descricao, $valor, $data)
    {
        global $conn;   //falta criar o arquivo de conexao e padronizar a variavel
        $query = "INSERT INTO TB_transacoes (descricao, valor, data)
                  VALUES (:descricao, :valor, :data)";

        try {
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":valor", $valor);
            $stmt->bindParam(":data", $data);
            $stmt->execute();

            return true;

        } catch (PDOException $e) {
            error_log("erro ao criar nova transacao: " . $e->getMessage());
            return false;
        }
    }

    public function editar($id, $descricao, $valor, $data)
    {
        global $conn;
        $query = "UPDATE TB_transacoes
                  SET descricao = :descricao,
                  valor = :valor,
                  data = :data
                  WHERE id = :id";

        try {
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":valor", $valor);
            $stmt->bindParam(":data", $data);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log("erro ao editar transacao" . $e->getMessage());
            return false;
        }

    }

    public function deletar($id)
    {
        global $conn;
        $query = "DELETE FROM TB_transacoes WHERE id = :id";

        try {
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log("erro ao deletar transacao" . $e->getMessage());
            return false;
        }
    }

}

?>