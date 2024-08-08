<?php

$pdo = null;

try {
  $pdo = new PDO(
    'mysql:dbname=teste;host=localhost;charset=utf8',
    'root',
    getenv('db_pass'),
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );

  $c = readline('Código: ');
  $n = readline('Nome: ');
  $a = readline('Altura: ');
  $p = readline('Peso: ');

  if(mb_strlen($n) < 1 || mb_strlen($n) > 100 ) {
    echo 'Nome inválido.';
    return;
  }
  if(!is_numeric($a) || !is_numeric($p)) {
    echo 'Peso/altura inválido.';
    return;
  }
  if($a < 0 || $p < 0) {
    echo 'Peso/altura negativo.';
    return;
  }
  if($a > 2.99 || $p > 299.9) {
    echo 'Peso/altura muito grande.';
    return;
  }

  $ps = $pdo->prepare('SELECT codigo FROM atleta WHERE codigo = ?');
  $ps->execute([$c]);
  if($ps->rowCount() == 0) {
    echo 'Atleta não existe.';
    return;
  }

  $ps = $pdo->prepare('UPDATE atleta SET nome = ?, altura = ?, peso = ? WHERE codigo = ?');
  $ps->execute([$n, $a, $p, $c]);

  echo 'Atualizado.';

} catch(PDOException $e) {
  die('Erro: ' . $e->getMessage());
}

?>