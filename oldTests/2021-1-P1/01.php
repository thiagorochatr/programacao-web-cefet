<?php

function contabilizar($array) {
  $saida = [];
  foreach ($array as $a) {
    if(isset($saida[$a])) {
      $saida[$a]++;
    } else {
      $saida[$a] = 1;
    }
  }
  return $saida;
}

$entrada = ['maçã', 'uva', 'maçã', 'banana', 'uva', 'goiaba', 'maçã', 'banana'];
$saida = contabilizar($entrada);
var_dump($saida);

?>