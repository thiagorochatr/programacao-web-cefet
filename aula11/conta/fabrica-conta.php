<?php
require_once 'log.php';
require_once 'RepositorioContaEmBDR.php';

function criarRepositorioConta() {

    try {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=aula11;charset=utf8',
            'root',
            '',
            [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]
        );
        $repositorio = new RepositorioContaEmBDR( $pdo );
        return $repositorio;
    } catch ( PDOException  $e ) {
        logar( $e );
        return null;
    }    
}