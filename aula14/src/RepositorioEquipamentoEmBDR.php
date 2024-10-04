<?php
require_once 'Equipamento.php';

class RepositorioEquipamentoEmBDR {

    private PDO $pdo;

    public function __construct( PDO $pdo ) {
        $this->pdo = $pdo;
    }

    /**
     * Retorna os equipamentos
     *
     * @return array<Equipamento>
     */
    public function equipamentos(): array {
        $sql = <<<'SQL'
        SELECT
            e.id, codigo, e.descricao, situacao, cadastro,
            categoria_id, c.descricao AS 'descricao_categoria'
        FROM equipamento e
        JOIN categoria c ON c.id = e.categoria_id
        SQL;
        $ps = $this->pdo->prepare( $sql );
        $ps->setFetchMode( PDO::FETCH_ASSOC );
        $ps->execute();
        $equipamentos = [];
        foreach ( $ps as $r ) {
            $equipamentos []= $this->registroParaEquipamento( $r );
        }
        return $equipamentos;
    }


    public function equipamentoComId( int $id ): ?Equipamento {
        $sql = <<<'SQL'
        SELECT
            e.id, codigo, e.descricao, situacao, cadastro,
            categoria_id, c.descricao AS 'descricao_categoria'
        FROM equipamento e
        JOIN categoria c ON c.id = e.categoria_id
        WHERE e.id = :id
        SQL;
        $ps = $this->pdo->prepare( $sql );
        $ps->setFetchMode( PDO::FETCH_ASSOC );
        $ps->execute( [ 'id' => $id ] );
        if ( $ps->rowCount() < 1 ) {
            return null;
        }
        $r = $ps->fetch();
        return $this->registroParaEquipamento( $r );
    }


    private function registroParaEquipamento( $r ): Equipamento {
        $c = new Categoria( $r[ 'categoria_id' ], $r[ 'descricao_categoria' ] );
        $e = new Equipamento(
            $r[ 'id' ], $r[ 'codigo' ], $r[ 'descricao'], $r[ 'situacao' ],
            new DateTime( $r[ 'cadastro' ] ),
            $c
        );
        return $e;
    }

    public function removerPeloId( int $id ): bool {
        $ps = $this->pdo->prepare( 'DELETE FROM equipamento WHERE id = ?' );
        $ps->execute( [ $id ] );
        return $ps->rowCount() > 0;
    }

    public function adicionar( Equipamento &$e ): void {
        $sql = <<<'SQL'
        INSERT INTO equipamento
        ( codigo, descricao, situacao, cadastro, categoria_id )
        VALUES
        ( :codigo, :descricao, :situacao, :cadastro, :categoria_id )
        SQL;
        $ps = $this->pdo->prepare( $sql );
        $ps->execute( [
            'codigo' => $e->codigo,
            'descricao' => $e->descricao,
            'situacao' => $e->situacao,
            'cadastro' => $e->cadastro->format( 'Y-m-d H:i:s' ),
            'categoria_id' => $e->categoria->id
        ] );

        $e->id = intval( $this->pdo->lastInsertId() );
    }
}