<?php
// print_r( PDO::getAvailableDrivers() );
$pdo = null;
try {
    $pdo = new PDO(
        'mysql:dbname=pw-aula6;host=localhost;charset=utf8',
        'root',
        getenv('db_pass'),
        [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]
    );
} catch ( PDOException $e ) {
    die( 'Erro: ' . $e->getMessage() );
}
// PDOStatement
$ps = $pdo->query( 'SELECT id, descricao, preco FROM produto' );
$produtos = $ps->fetchAll();
foreach ( $produtos as $p ) {
    echo $p[ 'id' ], ' ', $p[ 'descricao' ], ' R$ ', $p[ 'preco' ], PHP_EOL;
    // echo $p[ 0 ], PHP_EOL;
}
?>