<?php
// MODEL
class ModelCalculadora {
  function somar (string $x, string $y): int|float {
    if(!is_numeric($x)) {
      throw new RuntimeException('O primeiro número precisa ser numérico');
    }
    if(!is_numeric($y)) {
      throw new RuntimeException('O segundo número precisa ser numérico');
    }
    return $x + $y;
  }

  function dividir (string $x, string $y): int|float {
    if(!is_numeric($x)) {
      throw new RuntimeException('O primeiro número precisa ser numérico');
    }
    if(!is_numeric($y)) {
      throw new RuntimeException('O segundo número precisa ser numérico');
    }
    if($y == '0') {
      throw new RuntimeException('Não pode dividir por 0');
    }
    return $x/$y;
  }

  function realizarOperacao(string $operacao, string $x, string $y) {
    if($operacao == 'dividir') {
      return $this->dividir($x,$y);
    } else if($operacao == 'somar') {
      return $this->somar($x,$y);
    }
    throw new RuntimeException( 'Operação não suportada.' );
  }
}

?>