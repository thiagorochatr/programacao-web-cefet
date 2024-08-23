<?php

class Conta {
  /**
   * @return array<string>
   */
  public function validar() {
    $problemas = [];
    if(!is_numeric($this->id) || $this->id < 0) {
      $problemas[] = 'O ID deve ser um número não negativo';
    }
    // TODO -> outras validações.
    return $problemas;
  }
}

?>