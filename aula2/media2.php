<?php

// Exercício:
// Crie uma função que solicite do usuário um número
// indefinido de números, até que entre com o número 0.
// Guarde os números em um array e, então, calcule e
// imprima a média desses números.

function calcularMedia() {
    $numeros = [];
    do {
        $num = readline( 'Digite um número (0 p/ sair):' );
        if ( is_numeric( $num ) ) {
            $numeros []= (int) $num; // array_push( $numeros, $num );
        }
    } while ( $num != '0' );
    array_pop( $numeros ); // Retira 0 do fim
    $somatorio = 0;
    foreach ( $numeros as $num ) {
        $somatorio += $num;
    }
    $media = $somatorio / count( $numeros );
    echo 'A média é ', $media;
}

calcularMedia();
?>