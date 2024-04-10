<?php

// Solicite o código de um atleta para atualização, além dos novos valores para nome, altura e peso. O nome não deve ser vazio e deve respeitar o comprimento máximo do campo. A altura e o peso não devem ser negativos. A altura tem valor máximo 2,99 e o peso 299,9. Se o atleta existir e seus dados estiverem de acordo com as regras anteriores, eles devem ser atualizados. Do contrário, uma mensagem informando o problema deve ser exibida.

$pdo = null;

try {
  $pdo = new PDO(
    'mysql:dbname=teste;host=localhost;charset=utf8',
    'root',
    getenv('db_pass'),
    [
      PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
    ]
  );

  $code = readline('Código: ');
  $ps = $pdo->query('SELECT * FROM atleta WHERE codigo='.$code);
  $data = $ps->rowCount(); // rowCount retorna quantas linhas foram afetadas pela query
  if($data != 1) {
    die('Este código não existe.');
  }

  $nome = readline('Nome: ');
  if (mb_strlen($nome) == 0 OR mb_strlen($nome) > 100) {
    die('O nome não deve ser vazio, e deve ter no máximo 100 caracteres.');
  }

  $altura = readline('Altura (ex: 1.75): ');
  if ($altura < 0 OR $altura > 2.99) {
    die('A altura não pode ser negativa, e tem que ter valor máximo 2,99.');
  }

  $peso = readline('Peso (ex: 59.9): ');
  if ($peso < 0 OR $peso > 299.9) {
    die('O peso não pode ser negativo, e tem que ter valor máximo 299,9.');
  }

  $ps = $pdo->prepare('UPDATE atleta SET nome=?, altura=?, peso=? WHERE codigo=?');
  $ps->execute([$nome, $altura, $peso, $code]);

} catch (PDOException $e) {
  die('Erro: ' . $e->getMessage());
}

?>