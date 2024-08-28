<?php

require_once 'src/RepositorioCategoriaEmBDR.php';
require_once 'src/conexao.php';
function gerarCategorias( $id = 0 ) {
    $categorias = [];
    try {
        $pdo = conectar();
        $repo = new RepositorioCategoriaEmBDR( $pdo );
        $categorias = $repo->categorias();

    } catch ( Exception $e ) {
        die( 'Erro: ' . $e->getMessage() );
    }

    foreach ( $categorias as $c ) {
        if ( $id > 0 && $c->id === $id ) {
            echo "<option value=\"{$c->id}\" selected >{$c->descricao}</option>", PHP_EOL;
        } else {
            echo "<option value=\"{$c->id}\" >{$c->descricao}</option>", PHP_EOL;
        }
    }
}

?>