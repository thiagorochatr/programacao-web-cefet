<?php

// Dado o array de inventores abaixo, 
// a) Crie uma função que receba o array de inventores e retorne outro array contendo o sobrenome de cada inventor e uma chave indicando quantos anos viveu. Ex: [ [ "sobrenome" => 'Einstein', "viveu" => 77 ] ]
// b) Crie uma função que receba o array de inventores e retorne a média de anos vividos por eles.
// c) Crie uma função que receba o array de inventores e número de um século (ex.: 16) e retorne somente os inventores que viveram nele, mesmo que parcialmente.
// d) Crie uma função que retorne os inventores ordenados pelo sobrenome.

$inventores = [
  [ "nome" => 'Albert', "sobrenome" => 'Einstein', "nasc" => 1879,
  "morte" => 1955 ],
  [ "nome" => 'Isaac', "sobrenome" => 'Newton', "nasc" => 1643,
  "morte" => 1727 ],
  [ "nome" => 'Galileo', "sobrenome" => 'Galilei', "nasc" => 1564,
  "morte" => 1642 ],
  [ "nome" => 'Nicolaus', "sobrenome" => 'Copernicus', "nasc" => 1473,
  "morte" => 1543 ],
  [ "nome" => 'Ada', "sobrenome" => 'Lovelace', "nasc" => 1815,
  "morte" => 1852 ]
];

function funA($inventores) {
  $rtn = [];
  // foreach($inventores as $i => $inv) {
  //   $rtn[$i]['sobrenome'] = $inv['sobrenome'];
  //   $rtn[$i]['viveu'] = $inv['morte'] - $inv['nasc'];
  // }
  foreach($inventores as $inv) {
    $rtn [] = [
      'sobrenome' => $inv['sobrenome'],
      'viveu' => $inv['morte'] - $inv['nasc']
    ];
  }
  return $rtn;
}

function funB($inventores) {
  $s = 0;
  foreach($inventores as $inv) {
    $s += $inv['morte'] - $inv['nasc'];
  }
  return $s/count($inventores);
}

function funC($inventores, $sec) {
  $secBegin = ($sec - 1) * 100 + 1;
  $secEnd = $sec * 100;

  $rtn = [];
  foreach ($inventores as $inv) {
    if (
      $inv['morte'] >= $secBegin AND $inv['nasc'] <= $secEnd
    ) {
      $rtn [] = $inv['sobrenome'];
    }
  }
  return $rtn;
}

function funD($inventores) {
  usort($inventores, function($a, $b) {
      return strcmp($a['sobrenome'], $b['sobrenome']);
  });
  return $inventores;
}

?>