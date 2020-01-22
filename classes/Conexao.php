<?php
class Conexao {
    public static function getConexao() {
        $conexao = new PDO('mysql:host=localhost;dbname=estoque', 'root', 'Senha123#');
        return $conexao;
    }
}
