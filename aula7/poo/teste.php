<?php

require_once 'Conta.php';

$pdo = new PDO(
  'mysql:dbname=aula7;host=localhost;charset=utf8',
  'root',
  getenv('db_pass'),
  [
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
  ]
);

$ps = $pdo->prepare( 'SELECT * FROM conta' );
$ps->setFetchMode( PDO::FETCH_CLASS, 'Conta' );
$ps->execute();
var_dump( $ps->fetchAll() );

?>