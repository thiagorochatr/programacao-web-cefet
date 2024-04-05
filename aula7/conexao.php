<?php
function criarConexao() {
    try {
        $pdo = new PDO(
            'mysql:dbname=aula7;host=localhost;charset=utf8',
            'root',
            getenv('db_pass'),
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
        return $pdo;
    } catch (PDOException $e) {
        exit('Error: '. $e->getMessage());
    }
}
?>