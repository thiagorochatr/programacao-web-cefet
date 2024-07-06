<?php
require_once 'RepositorioCidadeEmBDR.php';
require_once 'Cidade.php';
require_once __DIR__ . '/../conexao.php';

$pdo = null;
try {
    $pdo = conectar();
    $repo = new RepositorioCidadeEmBDR( $pdo );
    if ( isset( $_POST[ 'nome' ] ) ) {
        $cidade = new Cidade( 0, $_POST[ 'nome' ] );
        $repo->adicionar( $cidade );
        // http_response_code( 201 ); // Created
        // http_response_code( 307 ); // Temporary Redirect
        http_response_code( 200 ); // OK
        // Pede p/ redirecionar para /cidades
        header( 'Location: /cidades' );
        die( $cidade->id ); // Ver na aba Network
    } else {
        http_response_code( 400 ); // Bad Request
        die( 'Campo não enviado: nome' );
    }
} catch ( PDOException $e ) {
    http_response_code( 500 ); // Erro do servidor!
    die( 'Erro processando operação' );
}
?>