<?php

class Cargo {
  public $id, $nome;
  public function __construct($id, $nome) {
    $this->id = $id;
    $this->nome = $nome;
  }
}

?>