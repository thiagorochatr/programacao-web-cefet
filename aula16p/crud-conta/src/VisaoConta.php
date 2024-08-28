<?php
require_once 'DominioException.php';

class VisaoConta {

    // Entradas

    function dadosConta() {
        return $_POST;
    }

    // Saídas

    function mostrarSalvoComSucesso() {
        http_response_code( 201 ); // Created
        die( 'Salvo.' );
    }

    function mostrarExcecao( Exception $e ) {
        if ( $e instanceof DominioException ) {
            http_response_code( 400 ); // Bad content
        } else {
            http_response_code( 500 ); // Internal Server Error
        }
        die( $e->getMessage() );
    }
}