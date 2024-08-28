<?php
declare(strict_types=1);
require_once 'geracao-categoria.php';
require_once 'src/RepositorioEquipamentoEmBDR.php';
require_once 'src/conexao.php';
require_once 'src/Situacao.php';

if ( ! isset( $_GET[ 'id' ] ) ) {
    die( 'Por favor, informe o parâmetro id.' );
}

$id = $_GET[ 'id' ];
if ( ! is_numeric( $id ) || $id <= 0 ) {
    die( 'O id deve ser um número positivo.' );
}

$e = null;
try {
    $repositorioEquipamento = new RepositorioEquipamentoEmBDR( conectar() );
    $e = $repositorioEquipamento->equipamentoComId( intval( $id ) );
    if ( $e === null ) {
        throw new Exception( 'Equipamento não encontrado.' );
    }
} catch ( Exception $e ) {
    die( $e->getMessage() );
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Equipamento</title>
</head>
<body>
    <h1>Equipamento</h1>
    <a href="listagem.php" >Voltar</a>
    <form action="alterar.php" method="POST" >
        <input type="hidden"
            value="<?php echo $e->id; ?>" />
        <label for="codigo">Código</label>
        <input type="text" id="codigo" name="codigo"
            value="<?php echo $e->codigo; ?>" >
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao"
            value="<?php echo $e->descricao; ?>" >
        <label for="situacao" accesskey="S" >Situação:</label>
        <select name="situacao" id="situacao" >
            <option value="U"
                <?php if ( $e->situacao === SITUACAO_EM_USO ) echo 'selected'; ?>
                >Em uso</option>
            <option value="D"
                <?php if ( $e->situacao === SITUACAO_COM_DEFEITO ) echo 'selected'; ?>
                >Com Defeito</option>
            <option value="E"
                <?php if ( $e->situacao === SITUACAO_EMBALADO ) echo 'selected'; ?>
                >Embalado</option>
        </select>
        <label for="categoria" accesskey="C" >Categoria:</label>
        <select name="categoria" id="categoria" >
            <?php
            gerarCategorias( $e->categoria->id );
            ?>
        </select>
        <button type="submit" >Enviar</button>
    </form>
</body>
</html>