<?php
require_once 'RepositorioFuncionarioEmBDR.php';

$pdo = null;

try {
  $pdo = new PDO(
    'mysql:dbname=p1_2a;host=localhost;charset=utf8',
    'root',
    getenv("db_pass"),
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );

  $percentual = readline('Percentual: ');
  $nomeCargo = readline('Nome do cargo: ');
  $tamNomeCargo = mb_strlen($nomeCargo);
  if($tamNomeCargo < 2 || $tamNomeCargo > 60) {
    echo 'Nome entre 2 e 60 caracteres.' . PHP_EOL;
    die('Operação sem sucesso.');
  }
  if(!is_numeric($percentual) || $percentual < 1.00 || $percentual > 20.00) {
    echo 'Percentual errado.' . PHP_EOL;
    die('Operação sem sucesso.');
  }

  $repo = new RepositorioFuncionarioEmBDR($pdo);
  $repo->atualizarSalarios($nomeCargo, $percentual);

  echo 'Operação realizada com sucesso.';

} catch(PDOException $e) {
  die("Erro: " . $e->getMessage());
}

?>