<?php
require_once 'RepositorioConta.php';

class RepositorioContaEmBDR implements RepositorioConta {

    private $pdo;

    public function __construct( PDO $pdo ) {
        $this->pdo = $pdo;
    }

    function adicionar(Conta $conta) {
        $sql = <<<'SQL'
            INSERT INTO conta ( descricao, valor ) VALUES
            ( :descricao, :valor )
        SQL;
        $ps = $this->pdo->prepare( $sql );
        $ps->execute( [
            'descricao' => $conta->descricao,
            'valor' => $conta->valor
        ] );
        $conta->id = intval( $this->pdo->lastInsertId() );
    }
}