<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Cidade</title>
</head>
<body>
    <h1>Alteração de Cidade</h1>
<?php
require_once 'RepositorioCidadeEmBDR.php';
require_once 'Cidade.php';
require_once __DIR__ . '/../conexao.php';

$pdo = null;
$cidade = new Cidade();
try {
    $pdo = conectar();
    $repo = new RepositorioCidadeEmBDR( $pdo );
    if ( isset( $_GET[ 'id' ] ) ) {
        $cidade = $repo->comId( $_GET[ 'id' ] );
        if ( $cidade === null ) {
            http_response_code( 404 ); // Not Found
            die( 'Cidade não encontrada.' );
        }
    } else {
        http_response_code( 400 ); // Bad Request
        die( 'O parâmetro de URL "id" não foi fornecido.' );
    }
} catch ( PDOException $e ) {
    http_response_code( 500 ); // Erro do servidor!
    die( 'Erro processando operação' );
}
?>
    <form action="alterar.php" method="POST">
        <input type="hidden" name="id"
            value="<?php echo $cidade->id; ?>" />
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" maxlength="60"
            value="<?php echo $cidade->nome; ?>" />
        <button type="submit">Salvar</button>
    </form>
</body>
</html>