<?php

function criarConexao() {
    $pdo = new PDO(
        'mysql:dbname=aula6;host=localhost;charset=utf8',
        'root',
        getenv('db_pass'),
        [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]
    );
    return $pdo;
}

?>