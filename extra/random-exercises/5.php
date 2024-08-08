<?php

// Crie um arquivo "produtos.php" com a função inventario( array $produtos ): array, que deve receber
// um array associativo em que as chaves são strings que representam produtos e os valores são arrays que contém
// dados sobre a quantidade e o preço do produto. A função deve calcular o valor total de cada produto e retornar um
// novo array associativo em que as chaves são os nomes dos produtos e os valores são os respectivos valores totais.
// Exemplo:
// Entrada
// [
//    "maçã"    => [ "quantidade" => 10, "preco" => 10.00 ],
//    "banana"  => [ "quantidade" => 5, "preco" => 6.00 ]
// ]
// Saída:
// [
//    "maçã"    => 100.00,
//    "banana"  => 30.00
// ]
// Observação: Assuma que o array de entrada sempre terá a estrutura correta e que os valoros numéricos serão válidos.

$produtos = [
  "maçã"    => [ "quantidade" => 10, "preco" => 10.00 ],
  "banana"  => [ "quantidade" => 5, "preco" => 6.00 ]
];

function inventario(array $produtos): array {
  $ret = [];
  foreach($produtos as $fruta => $arr) {
    $ret[$fruta] = $arr["quantidade"] * $arr["preco"];
  }
  return $ret;
}

$x = inventario($produtos);
foreach($x as $i => $x) {
  echo "$i: $x\n";
}
?>