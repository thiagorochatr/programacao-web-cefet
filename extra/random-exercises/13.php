<?php

function removerPontuacao($texto) {
  $texto = str_replace(' ', '', $texto);
  $texto = str_replace([',','-','.',';',':','!','?'], '', $texto);
  return $texto;
}

// echo removerPontuacao('d-d dd;d:d  dd;d');

function removerDiacriticos($t) {
  $t = str_replace(['á','à','ä','â','ã'], 'a', $t);
  $t = str_replace(['Á','À','Ä','Â','Ã'], 'A', $t);
  $t = str_replace(['é','è','ë','ê'], 'e', $t);
  $t = str_replace(['É','È','Ë','Ê'], 'E', $t);
  $t = str_replace(['í','ì','ï','î'], 'i', $t);
  $t = str_replace(['Í','Ì','Ï','Î'], 'I', $t);
  $t = str_replace(['ó','ò','ö','ô','õ'], 'o', $t);
  $t = str_replace(['Ó','Ò','Ö','Ô','Õ'], 'O', $t);
  $t = str_replace(['ú','ù','ü','û'], 'u', $t);
  $t = str_replace(['Ú','Ù','Ü','Û'], 'U', $t);
  $t = str_replace('ç', 'c', $t);
  return $t;
}

// echo removerDiacriticos("café, camarões, hífen, armação");

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

function contar($data) {
  $a = [];
  foreach($data as $d) {
    if(isset($a[$d])) {
      $a[$d]++;
    } else {
      $a[$d] = 1;
    }
  }

  return $a;
}

// print_r(contar($dados));

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

function funA($inv) {
  $arr = [];
  foreach($inv as $i) {
    $idade = $i['morte'] - $i['nasc'];
    $arr[] = ['sobrenome' => $i['sobrenome'], 'viveu' => $idade];
  }
  return $arr;
}

// print_r(funA($inventores));

function funB($inv) {
  $total = 0;
  $sumIdade = 0;
  foreach($inv as $i) {
    $total++;
    $sumIdade += $i['morte'] - $i['nasc'];
  }
  return $sumIdade/$total;
}

// echo funB($inventores);

?>