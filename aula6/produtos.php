<?php

$pdo = null;
try {
    $pdo = new PDO(
        'mysql:dbname=aula6;host=localhost;charset=utf8',
        'root',
        getenv('db_pass'),
        [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]
    );
} catch ( PDOException $e ) {
    die( 'Erro: ' . $e->getMessage() );
}

// PDOStatement
$ps = $pdo->query( 'SELECT id, descricao, estoque, preco FROM produto' );
$produtos = $ps->fetchAll();
imprimirTracos();
imprimirDados( 'id', 'descricao', 'estoque', 'preco' );
imprimirTracos();
foreach ( $produtos as $p ) {
    imprimirDados( $p[ 'id' ], $p[ 'descricao' ], $p[ 'estoque' ], 'R$ ' . $p[ 'preco' ] );
}

$ps = $pdo->query( 'SELECT SUM(estoque) AS somaEstoque, MAX(preco) AS maiorPreco FROM produto' );
$linha = $ps->fetch();
imprimirTracos();
imprimirDados( '', '', 'soma:', 'maior:' );
imprimirDados( '', '', $linha[ 'somaEstoque' ], 'R$ ' . $linha[ 'maiorPreco' ] );

function imprimirTracos() {
    echo str_repeat( '-', 65 ), PHP_EOL;
}

function imprimirDados( $id, $descricao, $estoque, $preco ) {
    echo str_pad( $id, 3 ),
        ' ', str_pad( $descricao, 40 ),
        ' ', str_pad( $estoque, 7 ),
        ' ', str_pad( $preco, 10 ), PHP_EOL;
}
?>