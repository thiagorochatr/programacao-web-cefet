<?php

function conexao() {
  try {
    $pdo = new PDO(
      'mysql:dbname=acme;host:https://mysql.acme.com;charset=utf8',
      'gerente',
      'g3ReNT&',
      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]
    );
    return $pdo;
  } catch (PDOException $e) {
    die ("Erro: " . $e->getMessage());
  }
}

?>