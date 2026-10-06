<?php
require_once("Categoriasodel.php");

class CategoriasController
{
    public function listar()
    {

        $model = new CategoriasModel();

        $listar = $model->listar();

        if (!$listar) {
            return "Erro ao tentar listar categoria";
        }

        return $listar;
    }
    public function buscarPorId()
    {
        $id = $_POST["id"] ?? "";

        if (empty($id)) {
            return "ID da categoria não informada";
        }

        $model = new CategoriasModel();

        $buscarPorId = $model->buscarPorId($id);

        if (!$buscarPorId) {
            return "Erro ao tentar buscar categoria";
        }

        return $buscarPorId;
    }
    public function buscarPorCategoria()
    {
        $categoria_id = $_POST["categoria_id"] ?? "";

        if (empty($categoria_id)) {
            return "ID da categoria não informada";
        }

        $model = new CategoriaModel();

        $buscarPorCategoria = $model->buscarPorCategoria($categoria_id);

        if (!$buscarPorCategoria) {
            return "Erro ao tentar buscar trasacao por categoria";
        }

        return $buscarPorCategoria;
    }
    public function criar()
    {
        $nome = $_POST["nome"] ?? "";
        $descricao = $_POST["descricao"] ?? "";
        $usuario_id = $_POST["usuario_id"] ?? "";

        $model = new CategoriasModel();

        $criar = $model->criar($nome, $descricao, $usuario_id);

        if (!$criar) {
            return "Erro ao tentar criar categoria";
        }

        return "Categoria criada com sucesso!";
    }
    public function editar()
    {
        $id = $_POST["id"] ?? "";
        $nome = $_POST["nome"] ?? "";
        $descricao = $_POST["descricao"] ?? "";
        $usuario_id = $_POST["usuario_id"] ?? "";

        if (empty($id)) {
            return "ID da categoria não informado";
        }

        if (empty($nome)) {
            return "nome da categoria não informado";
        }

        if (empty($descricao)) {
            return "descricao da categoria não informada";
        }

        $model = new CategoriasModel();

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
            return "ID da categoria não informado";
        }

        $model = new CategoriasModel();

        $deletar = $model->deletar($id);

        if (!$deletar) {
            return "Erro ao tentar deletar categoria";
        }

        return "Categoria deletada com sucesso!";
    }

}

?>