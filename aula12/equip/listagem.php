<?php
require_once 'src/RepositorioEquipamentoEmBDR.php';
require_once 'src/Situacao.php';

function gerarLinhasComEquipamentos() {
    $equipamentos = [];
    try {
        $pdo = new PDO( 'mysql:dbname=aula12;charset=utf8;host=localhost',
            'root', '', [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ] );
        $repo = new RepositorioEquipamentoEmBDR( $pdo );
        $equipamentos = $repo->equipamentos();
    } catch ( Exception $e ) {
        die( 'Erro: ' . $e->getMessage() );
    }
    foreach ( $equipamentos as $e ) {
        $situacao = SITUACAO_VALORES[ $e->situacao ];
        echo <<<HTML
            <tr>
                <td>{$e->id}</td>
                <td>{$e->codigo}</td>
                <td>{$e->descricao}</td>
                <td>{$situacao}</td>
                <td>{$e->categoria->descricao}</td>
                <td>{$e->cadastro->format( 'd/m/Y H:i:s' )}</td>
            </tr>
        HTML;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipamentos</title>
</head>
<body>
    <h1>Equipamentos</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Código</th>
                <th>Descrição</th>
                <th>Situação</th>
                <th>Categoria</th>
                <th>Cadastro em</th>
            </tr>
        </thead>
        <tbody>
        <?php
            gerarLinhasComEquipamentos();
        ?>
        </tbody>
    </table>
</body>
</html>
