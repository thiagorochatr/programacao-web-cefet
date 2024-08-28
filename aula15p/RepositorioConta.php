<?php
class RepositorioConta {

    public function __construct( private readonly PDO $pdo ) {
    }

    public function adicionar( Conta $c ): void {
        $sql = <<<'SQL'
            INSERT INTO conta ( descricao, valor )
            VALUES ( :descricao, :valor )
        SQL;
        $ps = $this->pdo->prepare( $sql );
        $ps->execute( [ 'descricao' => $c->descricao, 'valor' => $c->valor ] );
        $c->id = intval( $this->pdo->lastInsertId() );
    }
}