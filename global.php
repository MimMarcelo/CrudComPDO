<?php

require_once './config.php';
spl_autoload_register('carregarClasse');

function carregarClasse($nomeClasse){
    $arquivo = "classes/$nomeClasse.php";
//    echo "";
    if(file_exists($arquivo)){
        require_once $arquivo;
    }
}