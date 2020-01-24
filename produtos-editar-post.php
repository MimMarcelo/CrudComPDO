<?php

require_once './global.php';

try{
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $categoria_id = $_POST['categoria_id'];
    
    $produto = new Produto($id);
    
    $produto->nome = $nome;
    $produto->preco = $preco;
    $produto->quantidade = $quantidade;
    $produto->categoria_id = $categoria_id;
    
    $produto->atualizar();
//    print_r($produto);
//    exit();
    
    header("Location: produtos.php");
} catch (Exception $ex) {
    Erro::tratarErro($ex);
}