<?php

class Produto {

    public $id;
    public $nome;
    public $preco;
    public $quantidade;
    public $categoria_id;
    
    public static function listar(){
        $query = "SELECT p.id, p.nome, preco, quantidade, categoria_id, c.nome as categoria "
                . "FROM produtos p INNER JOIN categorias c "
                . "ON p.categoria_id=c.id "
                . "ORDER BY p.nome;";
        $conexao = Conexao::getConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }
    
    public function inserir(){
        $query = "INSERT INTO produtos (nome, preco, quantidade, categoria_id) "
                . "VALUES ('{$this->nome}', {$this->preco}, {$this->quantidade}, {$this->categoria_id});";
//        echo "$query";
                $conexao = Conexao::getConexao();
                $conexao->exec($query);
    }
}
