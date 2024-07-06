<?php
require_once 'conta/Conta.php';
require_once 'conta/fabrica-conta.php';
require_once 'log.php';

$id = bin2hex( random_bytes( 5 ) ); // 10 bytes

$conta = new Conta(
    $id,
    $_POST[ 'descricao' ],
    $_POST[ 'tipo' ],
    $_POST[ 'valor' ],
    $_POST[ 'vencimento' ],
    isset( $_POST[ 'paga' ] ) // bool
);

$repositorio = criarRepositorioConta();
if ( $repositorio === null ) {
    die( 'Erro ao cadastrar a conta.' );
}

try {
    $repositorio->adicionar( $conta );
} catch ( Exception $e ) {
    logar( $e );
    die( 'Erro ao cadastrar a conta.' );
}

header( 'Location: listagem-contas.php' );
?>