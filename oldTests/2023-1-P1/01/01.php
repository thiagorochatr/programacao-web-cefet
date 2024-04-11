<?php

// Faça um script que leia um arquivo CSV (exemplo em pereciveis.csv), que pode ter produtos diversos, seguindo o exemplo do arquivo, e então imprima quais produtos estão fora do prazo de validade (vencidos) e há quantos dias.

$arquivo = file_get_contents('pereciveis.csv');
$linhas = explode("\n", $arquivo);
array_shift($linhas);

foreach ($linhas as $linha) {
  $conteudoLinha = explode(';', $linha);
  $nome = $conteudoLinha[0];
  $data = $conteudoLinha[1];
  $validadeArray = array_reverse(explode('/', $data));
  $validadeNumber = intval(implode($validadeArray));
  $hoje = 20230505;

  if($hoje - $validadeNumber > 0) {
    echo $nome . ' - ' . $hoje - $validadeNumber . ' dias' . PHP_EOL;
  }
}

?>