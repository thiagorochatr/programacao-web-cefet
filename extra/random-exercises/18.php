<?php

$x = [
  'Thiago' => ['Português' => 8.00, 'Matemática' => 9.00],
  'Julia' => ['Português' => 7.00, 'Matemática' => 10.00],
  'Amanda' => ['Português' => 6.00, 'Matemática' => 9.00]
];

function fun($notas) {
  $final = [];
  foreach($notas as $nome => $nota) {
    $maiorNota = 0;
    $qtdMaterias = 0;
    $somaNotas = 0;
    foreach($nota as $n) {
      $qtdMaterias++;
      $somaNotas += $n;
      if($n > $maiorNota) {
        $maiorNota = $n;
      }
    }
    $media = $somaNotas/$qtdMaterias;
    $final[$nome] = [
      "média" => $media,
      "maior" => $maiorNota
    ];
  }
  return $final;
}

print_r(fun($x));

?>