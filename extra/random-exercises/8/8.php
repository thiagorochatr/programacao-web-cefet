<?php

$content = file_get_contents("pereciveis.csv");
$lines = explode("\n", $content);
array_shift($lines);

foreach($lines as $l) {
  $conteudo = explode(";", $l);
  $nome = $conteudo[0];
  $data = $conteudo[1];
  $aux = explode('/', $data);
  $validade = intval(implode(array_reverse($aux)));
  $hoje = 20230505;

  if($validade < $hoje) {
    echo "$nome - " . $hoje-$validade . " dias." . PHP_EOL;
  }
}

?>