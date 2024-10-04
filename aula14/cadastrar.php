<?php
declare(strict_types=1); // Verificação rigorosa de tipos

require_once 'src/conexao.php';
require_once 'src/RepositorioEquipamentoEmBDR.php';
require_once 'src/RepositorioCategoriaEmBDR.php';

if ( ! isset(
    $_POST[ 'codigo' ],
    $_POST[ 'descricao' ],
    $_POST[ 'situacao' ],
    $_POST[ 'categoria' ],
) ) {
    die( 'Por favor, informe todos os campos.' );
}

// TODO: validar

try {
    $pdo = conectar();

    $repoEquipamento = new RepositorioEquipamentoEmBDR( $pdo );
    $repoCategoria = new RepositorioCategoriaEmBDR( $pdo );

    $idCategoria = intval( $_POST[ 'categoria'] );
    $categoria = $repoCategoria->categoriaComId( $idCategoria );
    if ( $categoria === null ) {
        throw new Exception( 'Categoria inexistente.' );
    }

    $e = new Equipamento(
        0,
        htmlspecialchars( $_POST[ 'codigo' ] ),
        htmlspecialchars( $_POST[ 'descricao' ] ),
        htmlspecialchars( $_POST[ 'situacao' ] ),
        new DateTime(),
        $categoria
    );

    $repoEquipamento->adicionar( $e );

    // Redireciona
    header( 'Location: listagem.php' );
} catch ( Exception $e ) {
    die( 'Erro: ' . $e->getMessage() );
}