<?php

// NÃO esteja no namespace "Mma"
// i) solicite que o usuário informe o Id de dois lutadores;
// ii) Utilizando controle de transação e o repositório repositorio-lutador-em-bdr.php, remova os lutadores informados.

require_once 'repositorio-lutador-em-bdr.php';
use Mma\RepoEmBdr;

$repo = new RepoEmBdr();
$pdo= $repo->getPDO();

$id1 = readline('ID 1: ');
$id2 = readline('ID 2: ');

try {
  $pdo->beginTransaction();
  $repo->removerLutador($id1);
  $repo->removerLutador($id2);
  $pdo->commit();
} catch (PDOException $e) {
  if ($pdo->inTransaction()) {
    $pdo->rollBack();
  }
  die('Erro: ' . $e->getMessage());
}

?>