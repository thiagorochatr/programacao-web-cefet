<?php

// Exercício: Crie uma função chamada "extenso" que
// receba um dia, um mês e um ano e retorne no formato
// equivalente ao abaixo:
//  29 de Fevereiro de 2024

function extenso($dia, $mes, $ano) {
    $meses = [
        1 => 'janeiro', 2 => 'fevereiro', 3 => 'março',
        4 => 'abril', 5 => 'maio', 6 => 'junho',
        7 => 'julho', 8 => 'agosto', 9 => 'setembro',
        10 => 'outubro', 11 => 'novembro', 12 => 'dezembro'
    ];

    if ($dia < 1 || $dia > 31 || $mes < 1 || $mes > 12 || $ano < 0) {
        return 'Data inválida';
    }

    $dataExtenso = $dia . ' de ' . $meses[$mes] . ' de ' . $ano;

    return $dataExtenso;
}

$dia = 28;
$mes = 2;
$ano = 2024;

echo extenso($dia, $mes, $ano);
?>
