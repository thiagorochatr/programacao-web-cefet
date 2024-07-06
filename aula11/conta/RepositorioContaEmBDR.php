<?php
require_once 'RepositorioConta.php';
require_once 'Conta.php';

class RepositorioContaEmBDR implements RepositorioConta {

    /** @var PDO */
    private $pdo;

    public function __construct( PDO $pdo ) {
        $this->pdo = $pdo;
    }

    /** @inheritDoc */
    public function obterTodos() {
        $ps = $this->pdo->prepare( 'SELECT * FROM conta' );
        $ps->setFetchMode(
            PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
            'Conta'
        );
        $ps->execute();
        return $ps->fetchAll();
    }

    public function adicionar( Conta $c ) {
        $ps = $this->pdo->prepare( 'INSERT INTO conta
            ( id, descricao, valor, tipo, vencimento, paga )
            VALUES
            ( :id, :descricao, :valor, :tipo, :vencimento, :paga )'
        );
        $ps->execute( [
            'id'            => $c->id,
            'descricao'     => $c->descricao,
            'valor'         => $c->valor,
            'tipo'          => $c->tipo,
            'vencimento'    => $c->vencimento,
            'paga'          => $c->paga ? 1 : 0
        ] );
    }

    /** @inheritDoc */
    public function removerPeloId( $id ) {
        $ps = $this->pdo->prepare( 'DELETE FROM conta WHERE id = ?' );
        $ps->execute( [ $id ] );
    }
}