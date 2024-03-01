<?php

$usuarios = array();

$nome = readline("Digite o nome do usuário: ");
$idade = (int)readline("Digite a idade do usuário: ");
$usuarios[$nome] = $idade;

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
    $idade = (int)readline("Digite a idade do usuário: ");

    $usuarios[$nome] = $idade;
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
