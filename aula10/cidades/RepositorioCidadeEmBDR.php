<?php
require_once 'Cidade.php';
class RepositorioCidadeEmBDR {
    private $pdo = null;
    public function __construct( PDO $pdo ) {
        $this->pdo = $pdo;
    }

    /**
     * Retorna as cidades.
     *
     * @return array<int, Cidade>
     */
    public function consultar( $filtro = '' ) {
        $sql = 'SELECT id, nome FROM cidade';
        $parametros = [];
        if ( ! empty( $filtro ) ) {
            $sql .= ' WHERE nome LIKE :nome';
            $parametros[ 'nome' ] = '%' . $filtro . '%';
        }
        $ps = $this->pdo->prepare( $sql );
        $ps->setFetchMode(
            PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
            'Cidade'
        );
        $ps->execute( $parametros );
        return $ps->fetchAll();
        // Outra forma, depois do prepare:
        // $cidades = [];
        // $ps->execute();
        // foreach ( $ps->fetchAll() as $r ) { // ou foreach ( $ps as $r )
        //     $cidades []= new Cidade( $r[ 'id' ], $r[ 'nome' ] );
        // }
        // return $cidades;
    }

    function removerPeloId( $id ) {
        $ps = $this->pdo->prepare( 'DELETE FROM cidade WHERE id = ?' );
        $ps->execute( [ $id ] );
        return $ps->rowCount() > 0;
    }

    function adicionar( Cidade &$c ) {
        $ps = $this->pdo->prepare(
            'INSERT INTO cidade ( nome ) VALUES ( :nome )' );
        $ps->execute( [ 'nome' => $c->nome ] );
        $c->id = (int) $this->pdo->lastInsertId();
    }

    function comId( $id ) {
        $sql = 'SELECT id, nome FROM cidade WHERE id = ?';
        $ps = $this->pdo->prepare( $sql );
        $ps->setFetchMode(
            PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
            'Cidade'
        );
        $ps->execute( [ $id ] );
        if ( $ps->rowCount() > 0 ) {
            return $ps->fetch();
        }
        return null;
    }

    function atualizar( Cidade $c ) {
        $ps = $this->pdo->prepare(
            'UPDATE cidade SET nome = :nome WHERE id = :id' );
        $ps->execute( [
            'nome' => $c->nome,
            'id' => $c->id
        ] );
        return $ps->rowCount() > 0;
    }
}