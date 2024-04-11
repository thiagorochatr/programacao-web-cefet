<?php

// Crie uma função que receba o array abaixo e retorne outro array que contabilize o número de ocorrências de cada palavra.

$dados = [
  'carro',
  'carro',
  'caminhão',
  'caminhão',
  'bicicleta',
  'caminhada',
  'carro',
  'van',
  'bicicleta',
  'caminhada',
  'carro',
  'van',
  'carro',
  'caminhão',
];

function counter($data): array {
  return array_count_values($data);
}

// print_r(counter($dados));

?>