<?php

// DOES PHP HAVE A STRUCT DATA TYPE???????????
// LOL

class User {
    public $name;
    public $age;
}

$usuarios = array();

$obj = new User();
$obj->name = readline("Digite o nome do usuário: ");
$obj->age = (int)readline("Digite a idade do usuário: ");
$usuarios[] = $obj;

while (true) {
    $continuar = strtoupper(readline("Deseja incluir mais um? (S/N/R para remover): "));

    if ($continuar === 'R') {
        $nome = readline("Digite o nome do usuário a ser removido: ");
        $index = -1;
        foreach ($usuarios as $i => $usuario) {
            if ($usuario->name === $nome) {
                $index = $i;
                break;
            }
        }
        if ($index === -1) {
            echo "Usuário não encontrado\n";
            continue;
        }
        array_splice($usuarios, $index, 1);
        echo "Usuário removido\n";
        continue;
    }
    if ($continuar !== 'S') {
        break;
    }
    $obj = new User();
    $obj->name = readline("Digite o nome do usuário: ");
    $obj->age = (int)readline("Digite a idade do usuário: ");
    $usuarios[] = $obj;
}

echo "\nLista de Usuários:\n";
$maiorIdade = 0;
$nomeMaiorIdade = '';
foreach ($usuarios as $index => $usuario) {
    echo "$index: $usuario->name, $usuario->age\n", PHP_EOL;

    if ($usuario->age > $maiorIdade) {
        $maiorIdade = $usuario->age;
        $nomeMaiorIdade = $usuario->name;
    }
}
if ($maiorIdade !== 0) {
    echo "Maior idade: $maiorIdade, $nomeMaiorIdade\n";
}

?>
