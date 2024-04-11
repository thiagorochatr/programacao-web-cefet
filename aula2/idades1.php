<?php

// 1) Crie um programa que solicite um nome
// e uma idade do usuário, até que ele responda
// "N" à pergunta
// "Deseja incluir mais um? (S/N): ".
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

$nome = readline("Digite o nome do usuário: ");
$idade = readline("Digite a idade do usuário: ");
if (!is_numeric($idade)) {
    echo 'Idade inválida', PHP_EOL;
} else {
    $usuarios[$nome] = $idade;
}

while (true) {
    $continuar = strtoupper(readline("Deseja incluir mais um? (S/N/R para remover): "));
    
    if ($continuar === 'R') {
        $nome = readline("Digite o nome do usuário a ser removido: "); 
        if (!array_key_exists($nome, $usuarios)) {
            echo "Usuário não encontrado\n";
            continue;
        }
        unset($usuarios[$nome]);
        echo "Usuário removido\n";
        continue;
    }
    if ($continuar !== 'S') {
        break;
    }
    $nome = readline("Digite o nome do usuário: ");
    $idade = readline("Digite a idade do usuário: ");
    if (!is_numeric($idade)) {
        echo 'Idade inválida', PHP_EOL;
    } else {
        $usuarios[$nome] = $idade;
    }
}

echo "\nLista de Usuários:\n";
$maiorIdade = 0;
$nomeMaiorIdade = '';
foreach ($usuarios as $nome => $idade) {
    echo "$nome: $idade anos\n";
    
    if ($idade > $maiorIdade) {
        $maiorIdade = $idade;
        $nomeMaiorIdade = $nome;
    }
}
if ($maiorIdade !== 0) {
    echo "Maior idade: $maiorIdade, $nomeMaiorIdade\n";
}  

?>
