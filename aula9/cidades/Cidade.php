<?php
class Cidade {
  public int $id;
  public string $nome;

  public function __construct($id = 0, $nome = '') {
    $this->id = $id;
    $this->nome = $nome;
  }
}
?>