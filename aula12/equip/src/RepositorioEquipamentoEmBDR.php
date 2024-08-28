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
            $c = new Categoria( $r[ 'categoria_id' ], $r[ 'descricao_categoria' ] );
            $e = new Equipamento(
                $r[ 'id' ], $r[ 'codigo' ], $r[ 'descricao'], $r[ 'situacao' ],
                new DateTime( $r[ 'cadastro' ] ),
                $c
            );
            $equipamentos []= $e;
        }
        return $equipamentos;
    }
}

?>