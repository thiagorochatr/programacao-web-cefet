<?php

// Crie uma função que receba um array de números de telefone (formatados ou não) e retorne os telefones repetidos desse array (uma ocorrência de cada número repetido).

$phones = [
  '12345678',
  '12345678',
  '1234',
  '1234',
  '1234567890',
  '(12) 3456-7890',
  '(11) 1-1234-1234',
  '(11) 1-1234-1234'
];

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

function phoneRepeated( $phones ) {
  $count = [];
  foreach ( $phones as $t ) {
    $m = mask($t);
    if ( isset( $count [ $m ] ) ) {
      $count[ $m ]++;
    } else {
      $count[ $m ] = 1;
    }
  }
  $repeated = [];
  foreach ( $count as $phone => $value ) {
    if ( $value > 1 ) {
      $repeated [] = $phone;
    }
  }
  return $repeated;
}

print_r( phoneRepeated( $phones ) );

?>