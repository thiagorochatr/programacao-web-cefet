<?php

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