<?php

require_once "conexao.php";

$pdo = criarConexao();

$id = readline("ID: ");

$ps = $pdo->prepare("DELETE FROM produto WHERE id = ?");
$ps->execute([$id]);

?>