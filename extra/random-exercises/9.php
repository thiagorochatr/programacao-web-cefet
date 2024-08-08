<?php

$pdo = null;

try {
  $pdo = new PDO(
    'mysql:dbname=mma;host=localhost;charset=utf8',
    'dev',
    '123456',
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );
} catch(PDOException $e) {
  die("Erro: " . $e->getMessage());
}

function funA($pdo) {
  $ps = $pdo->query("SELECT * FROM lutador;");
  $data = $ps->fetchAll();
  foreach($data as $d) {
    echo $d['nome'] . PHP_EOL;
    echo $d['peso_em_quilos'] . PHP_EOL;
    echo $d['altura_em_metros'] . PHP_EOL;
  }
  return $data;
}

function funB($data) {
  $nLutadores = 0;
  $sumAlt = 0;
  $mAltura = 0;
  $mPeso = 0;
  foreach($data as $d) {
    $nLutadores++;
    $sumAlt += $d['altura_em_metros'];
    if($d['altura_em_metros'] > $mAltura) {
      $mAltura = $d['altura_em_metros'];
    }
    if($d['peso_em_quilos'] > $mPeso) {
      $mPeso = $d['peso_em_quilos'];
    }
  }

  echo $nLutadores . PHP_EOL;
  echo $sumAlt/$nLutadores . PHP_EOL;
  echo $mAltura . PHP_EOL;
  echo $mPeso . PHP_EOL;
}

?>