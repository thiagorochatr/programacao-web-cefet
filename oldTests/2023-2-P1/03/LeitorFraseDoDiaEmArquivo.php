<?php

// Considere a interface do arquivo "LeitorFraseDoDia.php".
// Crie este arquivo, que não esteja no namespace frase e que contenha uma implementação para a interface anterior. Essa implementação deve ler do arquivo "frases. txt" uma frase do dia, de uma linha aleatória. O arquivo possui uma frase por linha e cada linha é separada por "\n". Considere usar, para ler o arquivo, a função file_get_contents(), que recebe o nome do arquivo e retorna seu conteúdo como string. Considere usar, para gerar um número aleatório, a função rand(), que recebe dois argumentos, um número mínimo e um número máximo, e retorna um número inteiro entre ambos (incluindo os mesmos).

require_once 'LeitorFraseDoDia.php';
use frase\LeitorFraseDoDia;

class LeitorFraseDoDiaEmArquivo implements LeitorFraseDoDia {
  function ler(): string {
    $data = file_get_contents('frases.txt');
    $frasesArr = explode("\n", $data);
    $line = rand(1, 10);
    return $frasesArr[$line - 1];
  }
}

$x = new LeitorFraseDoDiaEmArquivo();
echo $x->ler();

?>