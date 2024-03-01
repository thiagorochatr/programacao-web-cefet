<?php

// Imprima os meses do ano com seus respectivos números

$meses = [
    1 => 'janeiro', 2 => 'fevereiro', 3 => 'março',
    4 => 'abril', 5 => 'maio', 6 => 'junho',
    7 => 'julho', 8 => 'agosto', 9 => 'setembro',
    10 => 'outubro', 11 => 'novembro', 12 => 'dezembro'
];

foreach ( $meses as $indice => $mes ) {
    echo "Número: $indice, Nome: $mes\n", PHP_EOL;
}
?>
