<?php
require_once 'RepositorioCidadeEmBDR.php';
$pdo = null;
$cidades = [];
try {
    $pdo = new PDO(
        'mysql:dbname=http;host=localhost;charset=utf8',
        'root',
        getenv('db_pass'),
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    $repo = new RepositorioCidadeEmBDR($pdo);
    if (isset($_GET['nome'])) {
        $cidades = $repo->consultar($_GET['nome']);
    } else {
        $cidades = $repo->consultar();
    }
} catch (PDOException $e) {
    http_response_code(500); // Erro do servidor!
    die('Erro processando operação');
}

function desenharCidades($cidades) {
    foreach ($cidades as $c) {
        $linha = <<<HTML
            <tr>
                <td>$c->id</td>
                <td>$c->nome</td>
            </tr>
        HTML;
        echo $linha, PHP_EOL;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cidades</title>
</head>
<body>
    <h1>Cidades</h1>
    <form> <!-- Por padrão usa GET e enviar p/ o arquivo atual. -->
        <label for="pesquisa">Pesquisa:</label>
        <input type="search" name="nome" id="pesquisa"
            value="<?php
            echo isset($_GET['nome']) ? $_GET['nome'] : ''
            ?>";
            />
        <button type="submit">Enviar</button>
    </form>
    <table>
        <thead>
            <tr><th>Id</th><th>Nome</th></tr>
        </thead>
        <tbody>
        <?php
        desenharCidades($cidades);
        ?>
        </tbody>
    </table>
</body>
</html>
