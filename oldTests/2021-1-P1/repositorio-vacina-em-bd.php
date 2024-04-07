<?php

namespace vac;

class RepositorioVacinaEmBD implements RepositorioVacina {
  private $pdo;

  public function __construct(\PDO $pdo) {
    $this->pdo = $pdo;
  }

  public function vacinas(): array {
    try {
      $stmt = $this->pdo->query('SELECT * FROM vacinas');
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
      throw new RepositorioException('Erro ao obter vacinas do banco de dados: ' . $e->getMessage());
    }
  }

  public function vacinaComId(int $id): ?Vacina {
    try {
      $stmt = $this->pdo->prepare('SELECT * FROM vacinas WHERE id = ?');
      $stmt->execute([$id]);
      $vacinaData = $stmt->fetch(\PDO::FETCH_ASSOC);
      if ($vacinaData) {
        return new Vacina($vacinaData['id'], $vacinaData['nome'], $vacinaData['fabricante']);
      } else {
        return null;
      }
    } catch (\PDOException $e) {
      throw new RepositorioException('Erro ao obter vacina do banco de dados: ' . $e->getMessage());
    }
  }

  public function atualizarVacina(Vacina $vacina): void {
    try {
      $stmt = $this->pdo->prepare('UPDATE vacinas SET nome = ?, fabricante = ? WHERE id = ?');
      $stmt->execute([$vacina->getNome(), $vacina->getFabricante(), $vacina->getId()]);
    } catch (\PDOException $e) {
      throw new RepositorioException('Erro ao atualizar vacina no banco de dados: ' . $e->getMessage());
    }
  }
}

?>
