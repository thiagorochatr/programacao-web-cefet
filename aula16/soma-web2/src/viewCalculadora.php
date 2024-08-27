<?php
// VIEW
class ViewCalculadora {
  public function mostrarFormulario() {
    return '
    <form method="post" action="">
        <input type="number" name="n1" required placeholder="Número 1">
        <input type="number" name="n2" required placeholder="Número 2">
        <input type="text" name="op" required placeholder="Operação">
        <input type="submit" value="Somar">
    </form>';
  }
  
  function mostrarResultado(int|float $resultado) {
    // echo 'Resultado: ' . $resultado . PHP_EOL;
    return "<h3>Resultado é: $resultado</h3>";
  }
  function mostrarExcecao(Exception $e): void {
    echo $e->getMessage() . PHP_EOL;
  }
}

?>