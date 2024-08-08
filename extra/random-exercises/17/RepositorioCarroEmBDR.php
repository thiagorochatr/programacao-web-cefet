<?php

use excecoes\RepositorioException;

class RepositorioCarroEmBDR implements RepositorioCarro {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  function todos() {
    $pdo = $this->pdo;
    $ps = $pdo->prepare('SELECT * FROM carro');
    $ps->execute();
    $data = $ps->fetchAll();
    $rtn = [];
    foreach($data as $d) {
      $carro = new Carro(
        $d['id'], $d['nome'], $d['fabricante'], $d['preco']
      );
      $rtn[] = $carro;
    }
    return $rtn;
  }

  function adicionar (Carro &$carro) {
    try {
      $pdo = $this->pdo;
      $ps = $pdo->prepare('INSERT INTO carro (nome, fabricante, preco) VALUES (? , ? , ?)');
      $ps->execute([
        $carro->nome, $carro->fabricante, $carro->preco
      ]);
      $carro->id = $pdo->lastInsertId();
    } catch(PDOException $e) {
      throw new RepositorioException("Erro: " . $e->getMessage());
    }
  }

  function atualizar( Carro $carro ) {
    try {
      $pdo = $this->pdo;
      $id = $carro->id;
      $nome = $carro->nome;
      $fabricante = $carro->fabricante;
      $preco = $carro->preco;

      $ps = $pdo->prepare('UPDATE carro SET (nome = ?, fabricante = ?, preco = ?) WHERE id = ?');
      $ps->execute([$nome, $fabricante, $preco, $id]);      

    } catch(PDOException $e) {
      throw new RepositorioException("Erro: " . $e->getMessage());
    }
  }

  function removePeloId($id) {
    try {
      $pdo = $this->pdo;
      $ps = $pdo->prepare('DELETE FROM carro WHERE id=?');
      $ps->execute([$id]);

    } catch(PDOException $e) {
      throw new RepositorioException("Erro: " . $e->getMessage());
    }
  }

}

?>