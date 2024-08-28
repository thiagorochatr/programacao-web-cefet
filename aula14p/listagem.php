<?php
require_once 'src/RepositorioEquipamentoEmBDR.php';
require_once 'src/Situacao.php';
require_once 'src/conexao.php';
function gerarLinhasComEquipamentos() {
    $equipamentos = [];
    try {
        $pdo = conectar();
        $repo = new RepositorioEquipamentoEmBDR( $pdo );
        $equipamentos = $repo->equipamentos();
    } catch ( Exception $e ) {
        die( 'Erro: ' . $e->getMessage() );
    }
    foreach ( $equipamentos as $e ) {
        $situacao = SITUACAO_VALORES[ $e->situacao ];
        $urlRemocao = "remover.php?id={$e->id}";
        $urlAlteracao = "form-alteracao.php?id={$e->id}";
        echo <<<HTML
            <tr>
                <td>{$e->id}</td>
                <td>{$e->codigo}</td>
                <td>{$e->descricao}</td>
                <td>{$situacao}</td>
                <td>{$e->categoria->descricao}</td>
                <td>{$e->cadastro->format( 'd/m/Y H:i:s' )}</td>
                <td><a href="{$urlRemocao}" >❌</a></td>
                <td><a href="{$urlAlteracao}" >📝</a></td>
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
    <a href="novo.php" >Novo</a>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Código</th>
                <th>Descrição</th>
                <th>Situação</th>
                <th>Categoria</th>
                <th>Cadastro em</th>
                <th>Remoção</th>
                <th>Alteração</th>
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
