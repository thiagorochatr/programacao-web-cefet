<?php

$usuarios = array();

while (true) {
    $nome = readline("Digite o nome do usuário: ");
    $idade = (int)readline("Digite a idade do usuário: ");

    $usuarios[$nome] = $idade;

    $continuar = strtoupper(readline("Deseja incluir mais um? (S/N): "));
    if ($continuar !== 'S') {
        break;
    }
}

echo "\nLista de Usuários:\n";
foreach ($usuarios as $nome => $idade) {
    echo "$nome: $idade anos\n";
}

?>
