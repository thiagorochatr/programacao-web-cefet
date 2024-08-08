<?php

require_once "conexao.php";

$pdo = criarConexao();

function inserirNoBdr(PDO $pdo, string $descricao, int $estoque, float $preco) {
  if(
    (mb_strlen($descricao) > 0 && mb_strlen($descricao) <= 200) &&
    (is_int($estoque)) &&
    (is_float($preco) && $preco > 0)
  ) {
    $ps = $pdo->prepare("INSERT INTO produto (descricao, estoque, preco) VALUES (?,?,?)");
    $ps->execute([$descricao, $estoque, $preco]);
  }
}

echo 'PRODUTO', PHP_EOL, str_repeat( '-', 12 ), PHP_EOL;
$descricao = readline( 'Descrição: ' );
$estoque = readline( 'Estoque: ' );
$preco = readline( 'Preço (R$): ' );

inserirNoBdr($pdo, $descricao, $estoque, $preco);

?>