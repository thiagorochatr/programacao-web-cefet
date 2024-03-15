<?php

echo str_replace( 'Iguaçú', 'Friburgo', 'CEFET Nova Iguaçú' ), PHP_EOL;

$partes = explode( '/', '14/03/2024');
$data = implode( '-', $partes );
echo $data, PHP_EOL;

echo mb_substr( 'CEFET Nova Friburgo', 11 ), PHP_EOL;

echo mb_strlen( sha1( 'Thiago' ) );

?>