<?php
$numero = readline( 'Informe um número: ' );
echo $numero + 10, "\n";
echo 'Número: ' . $numero . "\n"; // string única
echo 'Número: ', $numero, "\n";
echo 'Número: ', $numero, PHP_EOL;
var_dump( $numero );
var_dump( (int) $numero );
?>