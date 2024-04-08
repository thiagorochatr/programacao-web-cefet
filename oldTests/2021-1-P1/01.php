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
  // mesma coisa -> return array_count_values($array);
}

$entrada = ['maçã', 'uva', 'maçã', 'banana', 'uva', 'goiaba', 'maçã', 'banana'];
$saida = contabilizar($entrada);
var_dump($saida);

?>