<?php
class MenuConta { // Visao

    function desejaCadastrarConta() {
        return $_SERVER[ 'REQUEST_METHOD' ] === 'POST' &&
            mb_strpos( $_SERVER[ 'REQUEST_URI' ], '/contas' ) !== false;
    }

    function mostrarOpcaoInvalida() {
        http_response_code( 404 );
        die( 'Não encontrada.' );
    }
}