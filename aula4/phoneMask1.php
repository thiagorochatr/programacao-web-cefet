<?php

// Exercício 1 do ExerciciosFixacao-2024-1-Strings-Arrays.pdf

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