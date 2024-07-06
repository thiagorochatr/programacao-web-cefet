<?php
require_once 'RepositorioCidadeEmBDR.php';
require_once 'Cidade.php';
require_once __DIR__ . '/../conexao.php';

$pdo = null;
try {
    $pdo = conectar();
    $repo = new RepositorioCidadeEmBDR( $pdo );
    if ( isset( $_POST[ 'id' ], $_POST[ 'nome' ] ) ) {
        $cidade = new Cidade( $_POST[ 'id' ], $_POST[ 'nome' ] );
        $alterou = $repo->atualizar( $cidade );
        if ( ! $alterou ) {
            http_response_code( 404 ); // Not Found
            die( 'Cidade não encontrada para atualização.' );
        }
        http_response_code( 200 ); // OK
        // Pede p/ redirecionar para /cidades
        header( 'Location: /cidades' );
        die();
    } else {
        http_response_code( 400 ); // Bad Request
        die( 'Verifique se um dos campos não foi enviado: id, nome' );
    }
} catch ( PDOException $e ) {
    http_response_code( 500 ); // Erro do servidor!
    die( 'Erro processando operação' );
}
?>