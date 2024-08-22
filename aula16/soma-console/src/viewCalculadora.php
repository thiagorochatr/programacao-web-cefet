<?php
// VIEW
class ViewCalculadora {
  function numero(string $x): string {
    return readline('Número ' . $x . ': ');
  }
  function mostrarResultado(int|float $resultado): void {
    echo 'Resultado: ' . $resultado . PHP_EOL;
  }
  function mostrarExcecao(Exception $e): void {
    echo $e->getMessage() . PHP_EOL;
  }
}

?>