<?php
// 1) Crie um programa que solicite um nome
// e uma idade do usuário, até que ele responda
// "N" à pergunta.
// Em seguida, liste todos os usuários e suas
// idades correspondentes. Ambas devem ser
// armazenadas em um array na forma de uma mapa
// 2) Acrescente ao problema a impressão da
// maior idade, indicando o nome da pessoa e
// sua idade. Por exemplo:
// "A pessoa mais velha é Ana, que possui 92 anos."

// 3) Acrescente ao problema a solicitação ao
// usuário de um nome e retire-o da lista de
// usuários. Ex: "Nome a remover: ".
// Caso não encontrado, indique uma mensagem.

$usuarios = array();

$nome = readline("Nome: ");
$idade = readline("Idade: ");
if (is_numeric($idade) && $idade >= 0) {
  $usuarios[$nome] = $idade;
} else {
  echo "Idade inválida." . PHP_EOL;
}

while(true) {
  $aux = strtoupper(readline("Deseja incluir mais um? (S/N/R para remover): "));

  if($aux === "S") {
    $nome = readline("Nome: ");
    $idade = readline("Idade: ");
    if (is_numeric($idade) && $idade >= 0) {
      $usuarios[$nome] = $idade;
    } else {
      echo "Idade inválida.";
    }
    continue;
  } else if($aux === "R") {
    $nomeRemover = readline("Nome a remover: ");
    if (!array_key_exists($nomeRemover, $usuarios)) {
      echo "Pessoa não encontrada." . PHP_EOL;
      continue;
    }
    unset($usuarios[$nomeRemover]);
    echo "Usuário removido\n";
    continue;
  } else if($aux === "N") {
    break;
  } else {
    echo "Comando não encontrado." . PHP_EOL;
    continue;
  }
}

echo "\nLista de Usuários:\n";
$maiorIdade = 0;
$nomePessoa;
foreach($usuarios as $nome => $idade) {
  echo $nome . " - " . $idade . " anos" . PHP_EOL;
  if($idade > $maiorIdade) {
    $maiorIdade = $idade;
    $nomePessoa = $nome;
  }
}

echo "A pessoa mais velha é " . $nomePessoa . ", que possui " . $maiorIdade . " anos." . PHP_EOL;
?>