<?php

// Crie uma função que receba, via passagem por referência, um array de números de telefone não formatados e formate cada telefone desse array com a função construída em phoneMask1.php.

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

$phones = [
  [
    'cleanedValue' => '1234',
    'formattedValue' => ''
  ],
  [
    'cleanedValue' => '12345678',
    'formattedValue' => ''
  ],
  [
    'cleanedValue' => '1234567890',
    'formattedValue' => ''
  ],
  [
    'cleanedValue' => '12345678900',
    'formattedValue' => ''
  ],
  [
    'cleanedValue' => '08001231234',
    'formattedValue' => ''
  ]
];

function formatAll ( &$phones ) {
  foreach ($phones as $i => $p) {
    $phones[ $i ][ 'formattedValue' ] = mask($p['cleanedValue']);
  }
  echo 'Números formatados', PHP_EOL;
}

formatAll($phones);

foreach ($phones as $i => $p) {
  print_r($phones[$i]);
  // mesmo que -> print_r($p);
}
?>