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

// -> FAZENDO ESTE EXERCÍCIO UTILIZANDO UMA MANEIRA DE DIFERENCIAR OS USUÁRIOS
// COM UM ARRAY DE OBJETOS, ASSIM O ID É ÚNICO.

// DOES PHP HAVE A STRUCT DATA TYPE???????????
// LOL

class User {
    public $name;
    public $age;
}

$usuarios = array();

$name = readline("Digite o nome do usuário: ");
$age = readline("Digite a idade do usuário: ");
if(!is_numeric($age)) {
    echo 'Invalid age', PHP_EOL;
} else {
    $obj = new User();
    $obj->name = $name;
    $obj->age = $age;

    $usuarios[] = $obj;
}

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

    $name = readline("Digite o nome do usuário: ");
    $age = readline("Digite a idade do usuário: ");
    if(!is_numeric($age)) {
        echo 'Invalid age', PHP_EOL;
    } else {
        $obj = new User();
        $obj->name = $name;
        $obj->age = $age;

        $usuarios[] = $obj;
    }
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
