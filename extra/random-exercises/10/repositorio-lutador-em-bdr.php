<?php

namespace Mma;
use PDO;
use PDOException;

class RepositorioLutadorEmBDR implements RepositorioLutador {
  private $pdo;

  public function __construct() {
    $this->connect();
  }

  private function connect() {
    try {
      $this->pdo = new PDO(
        'mysql:dbname=mma;host=localhost;charset=utf8',
        'dev',
        '123456',
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
    } catch(PDOException $e) {}
  }
  
  public function adicionarLutador(\Lutador $lutador) {
    $pdo = $this->pdo;
    $ps = $pdo->prepare("INSERT INTO lutador VALUES ?,?,?,?");
    $ps->execute([
      $lutador->id,
      $lutador->nome,
      $lutador->pesoEmQuilos,
      $lutador->alturaEmMetros,
    ]);
  }

  public function removerLutador(int $id) {
    $pdo = $this->pdo;
    $ps = $pdo->prepare("DELETE FROM lutador WHERE id = ?");
    $ps->execute([$id]);
  }

  public function getPDO() {
    return $this->pdo;
  }
}


?>