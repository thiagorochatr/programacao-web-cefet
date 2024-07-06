<?php
require_once 'RepositorioCidadeEmBDR.php';
require_once __DIR__ . '/../conexao.php';

$pdo = null;
try {
    $pdo = conectar();
    $repo = new RepositorioCidadeEmBDR( $pdo );
    if ( isset( $_GET[ 'id' ] ) ) {
        $removeu = $repo->removerPeloId( $_GET[ 'id' ] );
        if ( ! $removeu ) {
            http_response_code( 404 ); // Not Found
            die( 'Cidade não encontrada para remoção.' );
        } else {
            http_response_code( 204 ); // No Content
            // Pede p/ redirecionar para /cidades
            header( 'Location: /cidades' );
            die();
        }
    } else {
        http_response_code( 400 ); // Bad Request
        die( 'Informe o id da cidade.' );
    }
} catch ( PDOException $e ) {
    http_response_code( 500 ); // Erro do servidor!
    die( 'Erro processando operação' );
}
?>