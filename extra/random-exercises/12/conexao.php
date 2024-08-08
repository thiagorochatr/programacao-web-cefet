<?php

function criarConexao() {
  try {
    $pdo = new PDO(
      'mysql:dbname=aula6;host=localhost;charset=utf8',
      'root',
      getenv('db_pass'),
      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]
    );
    return $pdo;
  } catch(PDOException $e) {
    die("Erro: " . $e->getMessage());
    return null;
  } 
}

?>