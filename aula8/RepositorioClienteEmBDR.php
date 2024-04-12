<?php

namespace acme1;

require_once 'RepositorioCliente.php';

class RepositorioClienteEmBDR implements RepositorioCliente {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo=$pdo;
  }

  function adicionar(Cliente &$c): void {
    try {
      $pdo = $this->pdo;
      $pdo->beginTransaction();
      $errors = $c->validar();
      if(count($errors) > 0){
        foreach($errors as $e) {
          echo '-' . $e . PHP_EOL;
        }
        die('Erro.');
      }
      $ps = $pdo->prepare('INSERT INTO cliente (nome) VALUES (?)');
      $ps->execute([$c->nome]);
      $c->id = $pdo->lastInsertId();

      $ps = $pdo->prepare('INSERT INTO cliente_telefone (cliente_id, numero) VALUES (?,?)');
      foreach($c->tel as $t){
        $ps->execute([$c->id, $t->numero]);
      }
      $pdo->commit();
    } catch (RepositorioException $e) {
      if($pdo->inTransaction()) {
        $pdo->rollBack();
      }
      die('Erro: ' . $e->getMessage());
    }
  }

  function removerPeloId(int $id): void {
    try {
      $pdo = $this->pdo;
      $pdo->beginTransaction();
      $ps = $pdo->prepare('DELETE FROM cliente WHERE id=?');
      $ps->execute([$id]);
      $pdo->commit();
    } catch (RepositorioException $e) {
      if($pdo->inTransaction()) {
        $pdo->rollBack();
      }
      die('Erro: ' . $e->getMessage());
    }

  }

  function todos() {
    $rtn = [];
    try {
      $pdo = $this->pdo;
      $pdo->beginTransaction();

      $ps = $pdo->query('SELECT * FROM cliente');
      $data = $ps->fetchAll();
      $aux = [];
      foreach($data as $d) {
        $ps = $pdo->prepare('SELECT * FROM cliente_telefone WHERE cliente_id=? LIMIT 2');
        $ps->execute([$d['id']]);
        $tel = $ps->fetchAll();
        $aux [] = $tel;
      }
      $rtn [] = $aux;
      
      $rtn [] = $data;
      $pdo->commit();
    } catch (RepositorioException $e) {
      if($pdo->inTransaction()) {
        $pdo->rollBack();
      }
      die('Erro: ' . $e->getMessage());
    }
    return $rtn;
  }

}

?>