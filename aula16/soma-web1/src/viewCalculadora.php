<?php
// VIEW
class ViewCalculadora {
  function numero(string $x): string {
    if(!isset($_GET['n'.$x])) {
      return '0';
    }
    return $_GET['n'.$x];
  }
  function mostrarResultado(int|float $resultado): void {
    echo 'Resultado: ' . $resultado . PHP_EOL;
  }
  function mostrarExcecao(Exception $e): void {
    echo $e->getMessage() . PHP_EOL;
  }
}

?>