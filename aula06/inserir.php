<?php
require_once 'conexao.php';

$pdo = null;
try {
    $pdo = criarConexao();
} catch ( PDOException $e ) {
    die( 'Erro ' . $e->getMessage() );
}

echo 'PRODUTO', PHP_EOL, str_repeat( '-', 40 ), PHP_EOL;
$descricao = readline( 'Descrição: ' );
$estoque = readline( 'Estoque: ' );
$preco = readline( 'Preço (R$): ' );

$contagem = $pdo->exec(
    "INSERT INTO produto ( descricao, estoque, preco )
    VALUES ( '$descricao', $estoque, $preco )"
);
echo $contagem === 1 ? 'Sucesso' : 'Erro';
?>