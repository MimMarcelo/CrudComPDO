<?php

require_once 'global.php';

$categoria = new Categoria();
$nome = $_POST['nome'];
$categoria->nome = $nome;
$categoria->inserir();

header("Location: categorias.php");