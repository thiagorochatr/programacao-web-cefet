<?php

class Carro {
  public $id = 0, $nome = '', $fabricante = '', $preco = 0.00;
  public function __construct($id = 0, $nome = '', $fabricante = '', $preco = 0.00) {
    $this->id = $id;
    $this->nome = $nome;
    $this->fabricante = $fabricante;
    $this->preco = $preco;
  }
}

?>