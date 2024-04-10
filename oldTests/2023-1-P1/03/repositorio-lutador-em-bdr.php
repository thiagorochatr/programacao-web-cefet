<?php

namespace Mma;
require_once 'repositorio-lutador.php';
require_once 'lutador.php';

use Lutador;
use PDO;
use PDOException;

class RepoEmBdr implements RepositorioLutador {
  private $pdo;

  public function __construct() {
    $this->connect();
  }

  function connect() {
    try {
      $this->pdo = new PDO(
        // 'mysql:dbname=mma;host=localhost;charset=utf8',
        // 'dev',
        // '123456',
        'mysql:dbname=teste;host=localhost;charset=utf8',
        'root',
        getenv("bd_pass"),
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
    } catch (PDOException $e) {
      die('Erro: ' . $e->getMessage());
    }
  }

  public function adicionarLutador(\Lutador $lutador) {
    try {
      $pdo = $this->pdo;
      $ps = $pdo->prepare('INSERT INTO lutador (id, nome, peso_em_quilos, altura_em_metros) VALUES (?, ?, ?, ?)');
      $ps->execute([
        $lutador->id,
        $lutador->nome,
        $lutador->pesoEmQuilos,
        $lutador->alturaEmMetros,
      ]);

    } catch (PDOException $e) {
      die('Erro: ' . $e->getMessage());
    }
  }

  public function removerLutador($id) {
    try {
      $pdo = $this->pdo;
      $ps = $pdo->prepare('DELETE FROM lutador WHERE id=?');
      $ps->execute([$id]);
    } catch (PDOException $e) {
      die('Erro: ' . $e->getMessage());
    }
  }

  public function getPDO() {
    return $this->pdo;
  }
}
?>