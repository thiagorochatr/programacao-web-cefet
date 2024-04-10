<?php

// Considere existir um banco de dados MySQL. Considere também a tabela do arquivo SQL.
// Liste todos os atletas da tabela ordenados pelo nome, com todos os campos, exceto o Id, conforme os exemplos abaixo. Observe que o peso e a altura devem ser listados com vírgula, em vez de ponto. Exemplo:
// 002 - Ana possui 62,3 kg e mede 1,78m
// 001 - Bia possui 51,0 kg e mede 1,60m

// Adicione ao fim da listagem acima, calculando apenas através de comando SQL, a média dos pesos e a maior das alturas.

$pdo = null;

try{
  $pdo = new PDO(
    'mysql:dbname=teste;host=localhost;charset=utf8',
    'root',
    getenv('db_pass'),
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]    
  );

  $ps = $pdo->query('SELECT * FROM atleta ORDER BY nome');
  $data = $ps->fetchAll();

  foreach ($data as $d) {
    $peso = str_replace('.', ',', $d['peso']);
    $altura = str_replace('.', ',', $d['altura']);
    echo $d['codigo'] . ' - ' . $d['nome'] . ' possui ' . $peso . ' kg e mede ' . $altura . 'm' . PHP_EOL;
  }

  $ps = $pdo->query('SELECT AVG(peso) as media_peso, MAX(altura) as max_altura FROM atleta');
  $data = $ps->fetch();

  echo 'Média dos pesos é ' . str_replace('.', ',', $data['media_peso']) . ' kg e a maior altura é ' . str_replace('.', ',', $data['max_altura']) . 'm' . PHP_EOL;

} catch (PDOException $e) {
  die('Erro: ' . $e->getMessage());
}

?>