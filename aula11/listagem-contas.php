<?php
require_once 'conta/RepositorioContaEmBDR.php';
require_once 'conta/Conta.php';
require_once 'conta/fabrica-conta.php';
require_once 'log.php';

/**
 * Retorna as linhas da tabela com os dados das contas.
 * 
 * @return string
 */
function gerarLinhas() {    
    
    $repositorio = criarRepositorioConta();
    if ( $repositorio === null ) {
        return '';
    }

    $contas = [];
    try {
        $contas = $repositorio->obterTodos();
    } catch ( Exception $e ) {
        logar( $e );
        return '';
    }

    $linhas  = '';
    foreach ( $contas as $c ) {
        // Ex. [ 2024, 7, 4 ]
        [ $ano, $mes, $dia ] = explode( '-', $c->vencimento );
        $vencimento = "$dia/$mes/$ano";

        $paga = $c->paga ? 'Sim' : 'Não';

        $valor = str_replace( '.', ',', $c->valor );

        $linhas .= <<<HTML
            <tr>
                <td>{$c->id}</td>
                <td>{$c->descricao}</td>
                <td>{$c->tipo}</td>
                <td>{$vencimento}</td>
                <td>{$paga}</td>
                <td>{$valor}</td>
                <td><a href="remover.php?id={$c->id}" >Remover</a>
            </tr>
        HTML;
    }
    return $linhas;
}

/**
 * Calcula e retorna o saldo total.
 * 
 * @return double
 */
function calcularTotal() {
    return 0;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas a Pagar e a Receber</title>
    <link rel="stylesheet" href="conta.css" />
</head>
<body>
    <header>
        <h1>Contas a Pagar e a Receber</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Vencimento</th>
                    <th>Paga ?</th>
                    <th>Valor (R$)</th>
                    <th>Remoção</th>
                </tr>
            </thead>
            <tbody>                
                <?php echo gerarLinhas(); ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" ></td>
                    <td><?php echo calcularTotal(); ?></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </main>
</body>
</html>