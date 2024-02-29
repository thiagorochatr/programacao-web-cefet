<?php

function calcularMedia() {
    $numeros = [];

    echo "Digite números (digite 0 para calcular a média):\n";
    
    while (true) {
        $num = (float) readline("Número: ");
        
        if ($num == 0) {
            // Calcular a média quando 0 é inserido
            if (count($numeros) === 0) {
                echo "Nenhum número foi digitado.\n";
            } else {
                $media = array_sum($numeros) / count($numeros);
                echo "Números digitados: " . implode(", ", $numeros) . "\n";
                echo "Média dos números: $media\n";
            }
            break;
        } else {
            // Adicionar número ao array
            $numeros[] = $num;
        }
    }
}

// Chamar a função
calcularMedia();

?>
