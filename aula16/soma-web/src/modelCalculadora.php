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
}

?>