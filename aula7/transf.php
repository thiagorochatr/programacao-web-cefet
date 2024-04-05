<?php
require_once 'conexao.php';

$pdo = null;

try {
  $pdo = criarConexao();

  $cpfFrom = readline('CPF origem: ');
  $cpfTo = readline('CPF destino: ');
  $amount = readline('Valor: ');

  if ( cpfExists($cpfFrom, $pdo) && cpfExists($cpfTo, $pdo) && amountValid($cpfFrom, $amount, $pdo) ) {

    $pdo->beginTransaction();
    makeTransaction($cpfFrom, $cpfTo, $amount, $pdo);
    $pdo->commit();
    echo 'FUNCIONOU';

  } else {
    die('Erro em algum dado.');
  }
} catch (PDOException $e) {
  if($pdo->inTransaction()){
    $pdo->rollBack();
  }
  die('Error: '. $e->getMessage());
}

function cpfExists($cpf, $pdo) {
    $ps = $pdo->prepare(
      'SELECT id FROM conta WHERE cpf = ?'
    );
    $ps->execute( [ $cpf ] );
    return $ps->rowCount() > 0;
}

function amountValid($cpf, $amountExpected, $pdo) {
    $ps = $pdo->prepare(
      'SELECT saldo FROM conta WHERE cpf = ?'
    );
    $ps->execute( [ $cpf ] );
    $line = $ps->fetch();
    $amount = $line['saldo'];

    return isset($line['saldo']) && $amount >= $amountExpected;
}

function makeTransaction($cpfFrom, $cpfTo, $amount, $pdo) {
  $ps = $pdo->prepare(
    'UPDATE conta SET saldo = saldo - :amount WHERE cpf = :cpf'
  );
  $ps->execute(['amount' => $amount, 'cpf' => $cpfFrom]);

  $ps = $pdo->prepare(
    'UPDATE conta SET saldo = saldo + :amount WHERE cpf = :cpf'
  );
  $ps->execute(['amount' => $amount, 'cpf' => $cpfTo]);
}
?>