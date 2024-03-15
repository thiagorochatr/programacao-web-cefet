<?php

function mask($phone): string {
  $clValue = $phone['cleanedValue'];
  $len = mb_strlen($clValue);
  if ($len == 8) {
    return mb_substr($clValue, 0, 4) . ' ' . mb_substr($clValue, 4);
  } else if ($len == 10) {
    return '(' . mb_substr($clValue, 0, 2) . ') ' . mb_substr($clValue, 2, 4) . '-' . mb_substr($clValue, 6);
  } else if ($len == 11) {
    if (mb_substr($clValue, 0, 4) == '0800' || mb_substr($clValue, 0, 4) == '0300' ) {
      return mb_substr($clValue, 0, 4) . ' ' . mb_substr($clValue, 4, 3) . ' ' . mb_substr($clValue, 7);
    } else {
      return '(' . mb_substr($clValue, 0, 2) . ') ' . mb_substr($clValue, 2, 1) . '-' . mb_substr($clValue, 3, 4) . '-' . mb_substr($clValue, 7);
    }
  } else {
    return $phone['cleanedValue'];
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
  echo 'Números formatados', PHP_EOL;
  foreach ($phones as $i => $p) {
    $phones[ $i ][ 'formattedValue' ] = mask($p);
  }
}

formatAll($phones);

foreach ($phones as $i => $p) {
  print_r($phones[$i]);
}

?>