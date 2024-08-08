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
} catch(PDOException $e) {
  die('Erro: ' . $e->getMessage());
}

$ps = $pdo->prepare('SELECT codigo, nome, peso, altura FROM atleta ORDER BY nome');
$ps->execute();
$data = $ps->fetchAll();

foreach($data as $d) {
  $alt = str_replace('.', ',', $d['altura']);
  $pes = str_replace('.', ',', $d['peso']);
  echo $d['codigo']. ' - '. $d['nome'] . ' possui ' . $pes . ' kg e mede ' . $alt . 'm' . PHP_EOL;
}

$ps = $pdo->prepare('SELECT AVG(peso) as mediaPeso, MAX(altura) as maxAltura FROM atleta');
$ps->execute();
$data = $ps->fetch();

echo 'Média dos pesos:' . $data['mediaPeso'] . PHP_EOL;
echo 'Maior altura:' . $data['maxAltura'] . PHP_EOL;

?>