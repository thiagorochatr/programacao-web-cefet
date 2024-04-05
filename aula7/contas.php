<?php
require_once 'conexao.php';

$pdo = null;

try {
  $pdo = criarConexao();
} catch (PDOException $e) {
  exit('Error: '. $e->getMessage());
}

$data = $pdo->query('SELECT nome, cpf, saldo FROM conta');
$conta = $data->fetchAll();
foreach ($conta as $c) {
  echo $c['cpf'], ' - ', $c['nome'], ' - ', $c['saldo'], PHP_EOL;
}

?>