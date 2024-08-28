<?php
declare(strict_types=1); // Verificação rigorosa de tipos

require_once 'src/conexao.php';
require_once 'src/RepositorioEquipamentoEmBDR.php';

if ( ! isset( $_GET[ 'id' ] ) ) {
    die( 'Por favor, informe o parâmetro id.' );
}

$id = $_GET[ 'id' ];
if ( ! is_numeric( $id ) || $id <= 0 ) {
    die( 'O id deve ser um número positivo.' );
}

try {
    $pdo = conectar();
    $repo = new RepositorioEquipamentoEmBDR( $pdo );
    $repo->removerPeloId( intval( $id ) );
    // Redireciona
    header( 'Location: listagem.php' );
} catch ( Exception $e ) {
    die( 'Erro: ' . $e->getMessage() );
}