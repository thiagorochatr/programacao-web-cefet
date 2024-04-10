<?php

$pdo = null;
try{
  $pdo = new PDO (
    // 'mysql:dbname=mma;host=localhost;charset=utf8',
    // 'dev',
    // '123456',
    'mysql:dbname=teste;host=localhost;charset=utf8',
    'root',
    getenv("bd_pass"),
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );

  $data = funA($pdo);
  echo('-------------------------------' . PHP_EOL);
  funB($data);
} catch(PDOException $e) {
  die('Erro: ' . $e->getMessage());
}

function funA($pdo) {
  $ps = $pdo->query('SELECT * FROM lutador;');
  $data = $ps->fetchAll();
  foreach($data as $d) {
    echo (
      'ID: ' . $d['id'] . ' - ' . 
      'NOME: ' . $d['nome'] . ' - ' . 
      'PESO: ' . $d['peso_em_quilos'] . ' - ' . 
      'ALTURA: ' . $d['altura_em_metros']
    ) . PHP_EOL;
  }
  return $data;
}

function funB($data) {
  $numLutadores = 0;
  $somaAlturas = 0;
  $maiorAltura = 0;
  $maiorPeso = 0;

  foreach ($data as $d) {
    $numLutadores++;
    $somaAlturas += $d['altura_em_metros'];
    if($d['altura_em_metros'] > $maiorAltura) {
      $maiorAltura = $d['altura_em_metros'];
    }
    if($d['peso_em_quilos'] > $maiorPeso) {
      $maiorPeso = $d['peso_em_quilos'];
    }
  }
  echo (
    'Nº de lutadores: ' . $numLutadores . ' - ' . 
    'Média das alturas: ' . $somaAlturas/$numLutadores . ' - ' . 
    'Maior peso: ' . $maiorPeso . ' - ' . 
    'Maior altura: ' . $maiorAltura
  ) . PHP_EOL;
}

?>