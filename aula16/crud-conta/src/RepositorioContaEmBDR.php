<?php

require_once 'Conta.php';

class RepositorioContaEmBDR implements RepositorioConta {

  private $pdo;

  public function __construct(PDO $pdo) {
    $this->pdo = $pdo;
  }

  function adicionar(Conta $conta) {
    $ps = $this->pdo->prepare('INSERT INTO conta (descricao, valor) VALUES ?, ?');
    
  }
}

?>