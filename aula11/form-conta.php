<?php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Conta</title>
    <style>
        input:not([type="radio"]):not([type="checkbox"]) {
            display: block;
        }
    </style>
</head>
<body>
    <header>
        <h1>Cadastro de Conta</h1>
    </header>    
    <main>
        <form action="cadastrar.php" method="POST" >
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" />
            
            <label for="tipo">Tipo:</label>
            <fieldset id="tipo" >
                <input type="radio" name="tipo" value="P" id="pagar" checked />
                <label for="pagar" accesskey="P">Pagar</label>
                <input type="radio" name="tipo" value="R" id="receber" />
                <label for="receber" accesskey="R" >Receber</label>                
            </fieldset>
            
            <label for="valor">Valor:</label>
            <input type="number" name="valor" id="valor" />

            <label for="vencimento">Vencimento:</label>
            <input type="date" name="vencimento" id="vencimento" />

            <input type="checkbox" name="paga" id="paga" value="1" />
            <label for="paga">Paga</label>

            <menu>
                <button type="submit" >Salvar</button>
                <button type="reset" >Limpar</button>
            </menu>
        </form>
    </main>
</body>
</html>