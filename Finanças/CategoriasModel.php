<?php

class CategoriasModel
{
    public function listar($usuario_id)
    {
        global $conn;
        $query = "SELECT * FROM TB_categorias WHERE usuario_id = "$usuario_id"";

        try 
        {
            $stmt = $conn->prepare($query);
            $stmt->bindParam("usuario_id", $usuario_id, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result ?: [];

        } catch (PDOException $e) 
        {
            error_log("erro ao listar categorias: " . $e->getMessage());
            return false;
        }
    }

    public function buscarPorId($id, $user_id)
{
    global $conn;
    $query = "SELECT * FROM TB_categorias 
              WHERE id = :id AND usuario_id = :usuario_id 
              LIMIT 1";

    try 
    {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":usuario_id", $usuario_id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ?: false;

    } catch (PDOException $e) 
    {
        error_log("erro ao buscar categoria por id: " . $e->getMessage());
        return false;
    }
}

public function criar($nome, $descricao, $usuario_id)
{
    global $conn;
    $query = "INSERT INTO TB_categorias (nome, descricao, usuario_id) 
              VALUES ("$nome", "$descricao", "$usuario_id")";

    try 
    {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("nome", $nome);
        $stmt->bindParam("descricao", $descricao);
        $stmt->bindParam("usuario_id", $usuario_id, PDO::PARAM_INT);
        $stmt->execute();

        return $conn->lastInsertId();

    } 
    {
        error_log("erro ao criar categoria: " . $e->getMessage());
        return false;
    }
}

    public function editar($id, $nome, $descricao, $usuario_id)
    {
        global $conn;
        $query = "UPDATE TB_categorias 
                  SET nome = "$nome", descricao = "$descricao"
                  WHERE id = "$id" AND usuario_id = "$usuario_id"";

        try 
        {
            $stmt = $conn->prepare($query);
            $stmt->bindParam("nome", $nome);
            $stmt->bindParam("descricao", $descricao);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->bindParam("usuario_id", $usuario_id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->rowCount() > 0;

        } catch (PDOException $e) 
        {
            error_log("erro ao editar categoria: " . $e->getMessage());
            return false;
        }
    }


    public function deletar($id, $user_id)
    {
        global $conn;
        $query = "DELETE FROM TB_categorias 
                  WHERE id = "$id" AND usuario_id = "$usuario_id"";

        try 
        {
            $stmt = $conn->prepare($query);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->bindParam("usuario_id", $usuario_id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->rowCount() > 0;

        } catch (PDOException $e) 
        {
            error_log("erro ao deletar categoria: " . $e->getMessage());
            return false;
        }
    }

}

?>