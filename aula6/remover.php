<?php
require_once 'conexao.php';

$pdo = null;
try {
    $pdo = criarConexao();
} catch ( PDOException $e ) {
    die( 'Erro ' . $e->getMessage() );
}

$id = readline( 'Id do produto a remover: ' );

$ps = $pdo->prepare( // PDOStatement
    'DELETE FROM produto WHERE id = ?'
);
$ps->execute( [ $id ] );
?>