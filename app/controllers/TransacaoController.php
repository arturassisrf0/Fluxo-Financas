<?php

require_once("TransacaoModel.php");

class TransacoesController
{
    public function listar()
    {

        $model = new TransacaoModel();

        $listar = $model->listar();

        if (!$listar) {
            return "Erro ao tentar listar transações";
        }

        return $listar;
    }
    public function buscarPorId()
    {
        $id = $_POST["id"] ?? "";

        if (empty($id)) {
            return "ID da transação não informado";
        }

        $model = new TransacaoModel();

        $buscarPorId = $model->buscarPorId($id);

        if (!$buscarPorId) {
            return "Erro ao tentar buscar transação";
        }

        return $buscarPorId;
    }
    public function buscarPorCategoria()
    {
        $categoria_id = $_POST["categoria_id"] ?? "";

        if (empty($categoria_id)) {
            return "ID da categoria não informado";
        }

        $model = new TransacaoModel();

        $buscarPorCategoria = $model->buscarPorCategoria($categoria_id);

        if (!$buscarPorCategoria) {
            return "Erro ao tentar buscar trasacao por categoria";
        }

        return $buscarPorCategoria;
    }
    public function criar()
    {
        $descricao = $_POST["descricao"] ?? "";
        $valor = $_POST["valor"] ?? "";
        $data = $_POST["data"] ?? "";

        if (empty($valor)) {
            return "valor da transação não informado";
        }

        if (empty($data)) {
            return "data da transação não informada";
        }

        $model = new TransacaoModel();

        $criar = $model->criar($descricao, $valor, $data);

        if (!$criar) {
            return "Erro ao tentar criar transação";
        }

        return "Transação criada com sucesso!";
    }
    public function editar()
    {
        $id = $_POST["id"] ?? "";
        $descricao = $_POST["descricao"] ?? "";
        $valor = $_POST["valor"] ?? "";
        $data = $_POST["data"] ?? "";

        if (empty($id)) {
            return "ID da transação não informado";
        }

        if (empty($valor)) {
            return "valor da transação não informado";
        }

        if (empty($data)) {
            return "data da transação não informado";
        }

        $model = new TransacaoModel();

        $editar = $model->editar($id, $descricao, $valor, $data);

        if (!$editar) {
            return "Erro ao tentar editar transação";
        }

        return "Transação editada com sucesso!";
    }
    public function deletar()
    {
        $id = $_POST["id"] ?? "";

        if (empty($id)) {
            return "ID da transação não informado";
        }

        $model = new TransacaoModel();

        $deletar = $model->deletar($id);

        if (!$deletar) {
            return "Erro ao tentar deletar transação";
        }

        return "Transação deletada com sucesso!";
    }

}

?>