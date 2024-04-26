<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Cadastro de bolsa</h1>
  <form method="POST" action="cadastro-bolsa.php">
    <input type="hidden" name="id" value="50" >
    <label for="nome" accesskey="N">Nome:</label>
    <input type="text" id="nome" name="nome">
    <label for="nasc">Nascimento:</label>
    <input type="date" id="nasc" name="nasc">
    <button type="submit" id="enviar">Enviar</button>
  </form>
</body>
</html>


<!-- php -S localhost:8181 -->