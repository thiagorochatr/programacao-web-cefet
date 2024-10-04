<?php
declare(strict_types=1);
require_once 'geracao-categoria.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Equipamento</title>
</head>
<body>
    <h1>Equipamento</h1>
    <a href="listagem.php" >Voltar</a>
    <form action="cadastrar.php" method="POST" >
        <label for="codigo">Código</label>
        <input type="text" id="codigo" name="codigo" >
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" >
        <label for="situacao" accesskey="S" >Situação:</label>
        <select name="situacao" id="situacao" >
            <option value="U" selected >Em uso</option>
            <option value="D" >Com Defeito</option>
            <option value="E" >Embalado</option>
        </select>
        <label for="categoria" accesskey="C" >Categoria:</label>
        <select name="categoria" id="categoria" >
            <?php
            gerarCategorias();
            ?>
        </select>
        <button type="submit" >Enviar</button>
    </form>
</body>
</html>