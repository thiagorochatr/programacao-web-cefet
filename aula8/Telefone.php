<?php

namespace acme1;

class Telefone {
  public int $id;
  public string $numero;

  public function __construct($numero, $id = 0) {
    $this->numero = $numero;
    $this->id = $id;
  }

  function validar(): array {
    $rtn = [];

    $tel = $this->numero;

    if(!is_numeric($tel)) {
      $rtn [] = 'O telefone deve conter apenas números.';
    }
    if (mb_strlen($tel) != 11) {
      $rtn [] = 'O telefone precisa ter 11 caracteres.'; 
    }

    return $rtn;
  }
}

?>