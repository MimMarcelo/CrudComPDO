<?php

require_once './global.php';

try {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $categoria_id = $_POST['categoria_id'];

    $p = new Produto();
    $p->nome = $nome;
    $p->preco = $preco;
    $p->quantidade = $quantidade;
    $p->categoria_id = $categoria_id;
    
    $p->inserir();
    
    header("Location: produtos.php");
} catch (Exception $ex) {
    Erro::tratarErro($ex);
} 