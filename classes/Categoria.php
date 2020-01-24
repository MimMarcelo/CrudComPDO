<?php

require_once 'global.php';

class Categoria {

    public $id;
    public $nome;
    public $produtos;

    public function __construct($id = false) {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    public static function listar() {
//        throw new Exception("Erro ao carregar categorias");
        $query = "SELECT id, nome FROM categorias ORDER BY nome";
        $conexao = Conexao::getConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar() {
        $query = "SELECT id, nome FROM categorias WHERE id=:id";
        $conexao = Conexao::getConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id", $this->id);
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->nome = $linha['nome'];
    }

    public function inserir() {
        $query = "INSERT INTO categorias (nome) VALUES (:nome)";
        $conexao = Conexao::getConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $this->nome);
        $stmt->execute();
    }

    public function atualizar() {
        $query = "UPDATE categorias SET nome=:nome WHERE id=:id";
        $conexao = Conexao::getConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id", $this->id);
        $stmt->bindValue(":nome", $this->nome);
        $stmt->execute();
    }

    public function excluir() {

        $query = "DELETE FROM categorias WHERE id=:id";
        $conexao = Conexao::getConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id", $this->id);
        $stmt->execute();
    }
    
    public function carregarProdutos(){
        $this->produtos = Produto::listarPorCategoria($this->id);
    }

}
