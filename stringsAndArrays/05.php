<?php

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

print_r(counter($dados));

?>