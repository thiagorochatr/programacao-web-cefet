<?php

require_once 'Conta.php';
// require_once 'Conta.php';

class GestorConta {

  private $repo;

  public function __construct(RepositorioConta $repo) {
    $this->repo = $repo;
  }

  function adicionarConta(array $valores) {
    if(!isset($valores['descricao'])) {
      throw new RuntimeException('Descrição não encontrada.');
    }
    if(!isset($valores['valor'])) {
      throw new RuntimeException('Valor não encontrado.');
    }

    // $conta = new Conta()
  }
}

?>