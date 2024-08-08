<?php
require_once "conexao.php";

$pdo = null;
try {
    $pdo = criarConexao();
} catch(PDOException $e) {
    die("Error " . $e->getMessage());
}

$id = readline("Id do produto a ser removido: ");

$ps = $pdo->prepare('DELETE FROM produto WHERE id = ?');
$ps->execute([$id]);
?>