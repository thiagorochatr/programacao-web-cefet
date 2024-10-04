<?php
declare(strict_types=1);
require_once 'Categoria.php';

class RepositorioCategoriaEmBDR {

    public function __construct( private PDO $pdo ) {
    }

    public function categorias(): array {
        $ps = $this->pdo->prepare( 'SELECT id, descricao FROM categoria' );
        $ps->setFetchMode( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
            Categoria::class );
        $ps->execute();
        return $ps->fetchAll();
    }

    public function categoriaComId( int $id ): ?Categoria {
        $ps = $this->pdo->prepare(
            'SELECT id, descricao FROM categoria WHERE id = :id' );
        $ps->setFetchMode( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
            Categoria::class );
        $ps->execute( [ 'id' => $id ] );
        if ( $ps->rowCount() < 1 ) {
            return null;
        }
        return $ps->fetch();
    }
}