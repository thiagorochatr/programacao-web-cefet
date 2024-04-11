<?php
require_once 'conexao.php';

$pdo = null;

try {
  $pdo = criarConexao();
  listarContas($pdo);
} catch (PDOException $e) {
  exit('Error: '. $e->getMessage());
}

function listarContas ($pdo) {
  $ps = $pdo->query('SELECT nome, cpf, saldo FROM conta');
  $contas = $ps->fetchAll();
  foreach ($contas as $c) {
    echo $c['cpf'], ' - ', $c['nome'], ' - ', $c['saldo'], PHP_EOL;
  }
}

?>