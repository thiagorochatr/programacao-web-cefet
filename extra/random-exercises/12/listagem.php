<?php

require_once "conexao.php";

$pdo = criarConexao();

listagem($pdo);

function listagem(PDO $pdo) {
  $ps = $pdo->prepare("SELECT * FROM produto");
  $ps->execute();
  $data = $ps->fetchAll();

  foreach($data as $d) {
    echo $d['id'] . ') ' . $d['descricao'] . ' - ' . $d['estoque'] . ' - ' . $d['preco'] . PHP_EOL;
  }

  $ps = $pdo->prepare("SELECT SUM(estoque) as sumEstoque FROM produto");
  $ps->execute();
  $x = $ps->fetch();
  echo $x['sumEstoque'] . PHP_EOL;

  $ps = $pdo->prepare("SELECT MAX(preco) as maxPreco FROM produto");
  $ps->execute();
  $y = $ps->fetch();
  echo $y['maxPreco'] . PHP_EOL;
}

?>