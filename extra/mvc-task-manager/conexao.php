<?php

function conexao() {
  try {
    $pdo = new PDO(
      'mysql:dbname=task_manager;host:localhost;charset=utf8',
      'root',
      getenv('db_pass'),
      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]
    );
    return $pdo;
  } catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
  }
}

?>