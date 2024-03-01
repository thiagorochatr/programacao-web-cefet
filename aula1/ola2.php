<?php
$nome = readline( "Seu nome: " );
echo "Olá, ", $nome, "\n";
echo "Seu nome possui ", bytes( $nome ), " bytes\n";

function bytes( $nome ) {
    return strlen( $nome );
}

echo bytes( "🙂" ), "\n";
echo bytes( "Thiago" );
?>