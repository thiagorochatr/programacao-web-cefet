<?php

// Considere um array como o abaixo, que pode conter mais itens, em qualquer ordem.
// Suas chaves podem ser números inteiros ou strings. Seus valores são sempre números inteiros.
// Crie a função somaSeparada que receba por argumento o array. A função deve retornar um array que contenha as chaves "letras" e "numeros". Essa chave "letras" deve conter o somatório dos valores de entrada cujas chaves não sejam números. A chave "números" deve conter o somatório dos valores de entrada cujas chaves sejam números.

$baseData = ["a"=>3, 0=>0, "b"=> 7, "c"=>2, 1=>5, "d"=>2, 2=>-1, 3=>0, 4=>-2, "e"=>-5];

function somaSeparada($arr): array {
  $rtn = [
    'letras' => 0,
    'numeros' => 0
  ];

  foreach ($arr as $i => $a) {
    if (is_numeric($i)) {
      $rtn['numeros'] += $a;
    } else {
      $rtn['letras'] += $a;
    }
  }
  return $rtn;
}

print_r(somaSeparada($baseData));
?>