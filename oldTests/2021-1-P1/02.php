<?php

function itensComecandoCom($s, $array) {
  $saida = [];
  $n = mb_strlen($s);
  foreach ($array as $a) {
    if (strtolower(mb_substr($a, 0, $n)) == strtolower($s)) {
      $saida [] = $a;
    }
  }
  return $saida;
}




$entrada = [ 'Pedro', 'pedra', 'cinto', 'lápis', 'Camila', 'dado' ];
$saida = itensComecandoCom( 'C', $entrada );
print_r( $saida );
// Exemplo de saída
// Array( [0] => Camila, [1] => cinto )

?>