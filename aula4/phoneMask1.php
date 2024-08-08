<?php

// Crie uma função que retorne formatado um número de telefone recebido por argumento. O formato deve estar acordo com os exemplos fornecidos abaixo:
// 8 dígitos: xxxx xxxx
// 10 dígitos: (xx) xxxx-xxxx
// 11 dígitos: (xx) x-xxxx-xxxx
// 11 dígitos, começando com 0800 ou 0300: xxxx xxx xxxx
// Se o número recebido pela função contiver algum caractere não numérico, a função deve retornar o próprio número recebido.
// O mesmo comportamento deve ocorrer caso a quantidade de dígitos do número não corresponder aos exemplificados na tabela acima.

$phone = [
  'cleanedValue' => '',
  'formattedValued' => ''
];

$phone['cleanedValue'] = readline('Digite o telefone: ');

function mask($phone): string {
  $len = mb_strlen($phone);
  if ($len == 8) {
    return mb_substr($phone, 0, 4) . ' ' . mb_substr($phone, 4);
  } else if ($len == 10) {
    return '(' . mb_substr($phone, 0, 2) . ') ' . mb_substr($phone, 2, 4) . '-' . mb_substr($phone, 6);
  } else if ($len == 11) {
    if (mb_substr($phone, 0, 4) == '0800' || mb_substr($phone, 0, 4) == '0300' ) {
      return mb_substr($phone, 0, 4) . ' ' . mb_substr($phone, 4, 3) . ' ' . mb_substr($phone, 7);
    } else {
      return '(' . mb_substr($phone, 0, 2) . ') ' . mb_substr($phone, 2, 1) . '-' . mb_substr($phone, 3, 4) . '-' . mb_substr($phone, 7);
    }
  } else {
    return $phone;
  }
}

$phone['formattedValued'] = mask($phone['cleanedValued']);
echo $phone['formattedValued'];
?>