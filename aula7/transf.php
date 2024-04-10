<?php
require_once 'conexao.php';

$pdo = null;

try {
  $pdo = criarConexao();

  $cpfFrom = readline('CPF origem: ');
  $cpfTo = readline('CPF destino: ');

  if (!cpfExists($cpfFrom, $pdo)) {
    die('Conta origem não existe.');
  }
  if (!cpfExists($cpfTo, $pdo)) {
    die('Conta destino não existe.');
  }

  $amount = readline('Valor a transferir: ');

  if (!is_numeric($amount) OR $amount <= 0) {
    die('Valor deve ser um número positivo.');
  }
  if (!amountValid($cpfFrom, $amount, $pdo)) {
    die('Conta origem sem saldo suficiente.');
  }

  $pdo->beginTransaction();
  makeTransaction($cpfFrom, $cpfTo, $amount, $pdo);
  $pdo->commit();
  echo 'Transferido com sucesso.';

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