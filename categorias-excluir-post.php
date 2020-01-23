<?php

require_once 'global.php';

$id = $_GET['id'];

$categoria = new Categoria($id);
$categoria->excluir();

header("Location: categorias.php");