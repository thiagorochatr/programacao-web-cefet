<?php
function logar( Exception $e ) {
    $conteudo = '[' . ( new DateTime() )->format( 'c' ) . '] '
        . $e->getMessage() . PHP_EOL;
    file_put_contents( 'log.txt', $conteudo, FILE_APPEND );    
}
?>