<?php

require_once 'global.php';

class Categoria {

    public $id;
    public $nome;
    
    public function __construct($id = false) {
        if($id){
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
        $query = "SELECT id, nome FROM categorias WHERE id={$this->id}";
        $conexao = Conexao::getConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha) {
            $this->nome = $linha['nome'];
        }
    }
    
    public function inserir() {
        $query = "INSERT INTO categorias (nome) VALUES ('{$this->nome}')";
        $conexao = Conexao::getConexao();
        $conexao->exec($query);
    }
    
    public function atualizar() {
        $query = "UPDATE categorias SET nome='{$this->nome}' WHERE id={$this->id}";
        $conexao = Conexao::getConexao();
        $conexao->exec($query);
    }
    
    public function excluir(){
        
        $query = "DELETE FROM categorias WHERE id={$this->id}";
        $conexao = Conexao::getConexao();
        $conexao->exec($query);
    }
}
