<?php
function conectar(): PDO {
    return new PDO( 'mysql:dbname=aula12;charset=utf8;host=localhost',
        'root', '', [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ] );
}
?>