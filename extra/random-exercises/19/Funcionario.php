<?php
require_once "Cargo.php";

class Funcionario {
  public $id, $nome, $salario;
  public Cargo $cargo;
  public function __construct($id, $nome, $salario, Cargo $cargo) {
    $this->id = $id;
    $this->nome = $nome;
    $this->salario = $salario;
    $this->cargo = $cargo;
  }
}

?>