<?php

namespace acme1;

class Cliente {
  public int $id;
  public string $nome;
  public $tel = [];

  public function __construct($nome, $tels, $id = 0) {
    $this->nome = $nome;
    $this->tel = $tels;
    $this->id = $id;
  }

  function validar(): array {
    $rtn = [];
    $tNome = mb_strlen($this->nome);
    if ($tNome < 2 OR $tNome > 100) {
      $rtn [] = 'O nome deve ter de 2 a 100 caracteres.';
    }

    foreach($this->tel as $t) {
      $telP = $t->validar();
      foreach($telP as $tp) {
        $rtn [] = $tp;
      }
    }

    return $rtn;
  }

}

?>