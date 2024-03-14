<?php
$texto = readline('Digite um texto: ');
echo 'CRC32: ', crc32($texto), PHP_EOL;
echo 'MD-5: ', md5($texto), PHP_EOL;
echo 'SHA-1: ', sha1($texto), PHP_EOL;
echo 'SHA-256: ', hash('sha256',$texto), PHP_EOL;
?>