<?php
// Exercício:
// Crie uma função que solicite do usuário um número
// indefinido de números, até que entre com o número 0.
// Guarde os números em um array e, então, calcule e
// imprima a média desses números.

function media() {
  $numeros = [];

  while(true) {
    $num = (float) readline("Digite um número, ou 0 para calcular a média: ");

    if(is_numeric($num)) {
      if($num == 0) {
        if(count($numeros) == 0) {
          echo "Nenhum número foi digitado." . PHP_EOL;
        } else {
          echo array_sum($numeros) / count($numeros);
        }
        break;
      } else {
        $numeros[] = $num;
        continue;
      }
    } else {
      echo "Erro." . PHP_EOL;
      break;
    }
  }
}

media();

?>