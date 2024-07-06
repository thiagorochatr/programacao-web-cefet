<?php
require_once 'conta/fabrica-conta.php';
require_once 'log.php';

$repositorio = criarRepositorioConta();
if ( $repositorio === null ) {
    die( 'Erro ao remover a conta.' );
}

try {
    $repositorio->removerPeloId( $_GET[ 'id' ] );
} catch ( Exception $e ) {
    logar( $e );
    die( 'Erro ao remover a conta.' );
}

header( 'Location: listagem-contas.php' );
?>