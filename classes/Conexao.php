<?php

require_once 'global.php';

class Conexao {
    public static function getConexao() {
        $conexao = new PDO(DB_DRIVE . ':host=' . DB_HOSTNAME . ';dbname=' . DB_DATABASE , DB_USERNAME, DB_PASSWORD);
        return $conexao;
    }
}
