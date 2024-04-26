<?php
require_once 'Cidade.php';
class RepositorioCidadeEmBDR {
    private $pdo = null;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Retorna as cidades.
     *
     * @return array<int, Cidade>
     */
    public function consultar($filtro = '') {
        $sql = 'SELECT id, nome FROM cidade';
        $parametros = [];
        if (! empty($filtro)) {
            $sql .= ' WHERE nome LIKE :nome';
            $parametros['nome'] = '%' . $filtro . '%';
        }
        $ps = $this->pdo->prepare($sql);
        $ps->setFetchMode(
            PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
            'Cidade'
        );
        $ps->execute($parametros);
        return $ps->fetchAll();
        // Outra forma, depois do prepare:
        // $cidades = [];
        // $ps->execute();
        // foreach ( $ps->fetchAll() as $r ) { // ou foreach ( $ps as $r )
        //     $cidades []= new Cidade( $r[ 'id' ], $r[ 'nome' ] );
        // }
        // return $cidades;
    }
}