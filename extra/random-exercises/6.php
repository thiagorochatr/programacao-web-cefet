<?php
// Crie uma função que retorne formatado um número de telefone recebido por argumento. O formato deve estar acordo com os exemplos fornecidos abaixo:
// 8 dígitos: xxxx xxxx
// 10 dígitos: (xx) xxxx-xxxx
// 11 dígitos: (xx) x-xxxx-xxxx
// 11 dígitos, começando com 0800 ou 0300: xxxx xxx xxxx
// Se o número recebido pela função contiver algum caractere não numérico, a função deve retornar o próprio número recebido.
// O mesmo comportamento deve ocorrer caso a quantidade de dígitos do número não corresponder aos exemplificados na tabela acima.

// Crie uma função que receba, via passagem por referência, um array de números de telefone
// não formatados e formate cada telefone desse array com a função construída.

// Crie uma função que receba um array de números de telefone (formatados ou não) e
// retorne os telefones repetidos desse array (uma ocorrência de cada número repetido).

function format(string $tel): string {
  if(!is_numeric($tel)) {
    return $tel;
  } else if(mb_strlen($tel) < 8 || mb_strlen($tel) == 9 || mb_strlen($tel) > 11) {
    return $tel;
  } else {
    if(mb_strlen($tel) == 8) {
      return mb_substr($tel, 0, 4) . " " . mb_substr($tel, 4);
    } else if(mb_strlen($tel) == 10) {
      return "(" . mb_substr($tel, 0, 2) . ") " . mb_substr($tel, 2, 4) . "-" . mb_substr($tel, 6);
    } else {
      if(mb_substr($tel, 0, 4) === "0800" || mb_substr($tel, 0, 4) === "0300") {
        return mb_substr($tel, 0, 4) . " " . mb_substr($tel, 4, 3) . " " . mb_substr($tel, 7);
      } else {
        return "(" . mb_substr($tel, 0, 2) . ") " . mb_substr($tel, 2, 1) . "-" . mb_substr($tel, 3, 4) . "-" . mb_substr($tel, 7);
      }
    }
  }
}

$tels = [
  "12345678",
  "1234567890",
  "08004567890",
  "12345678",
  "(12) 3456-7890",
  "12312345",
  "1234567890",
  "(11) 1-1234-1234",
  '1234',
  '1234',
  '1234567890',
  '(12) 3456-7890',
];

function formatAll(&$tels) {
  foreach($tels as &$t) {
    $t = format($t);
  }
  // foreach($tels as $i => $t) {
  //   $tels[$i] = format($t);
  // }
}

function isRepeated($tels) {
  formatAll($tels);
  $count = [];
  foreach($tels as $t) {
    if(array_key_exists($t, $count)) {
      $count[$t]++;
    } else {
      $count[$t] = 1;
    }
  }

  foreach($count as $tel => $c) {
    if($c > 1) {
      echo "$tel apareceu $c vezes." . PHP_EOL;
    }
  }
}

isRepeated($tels);

?>