<?php

require_once 'LeitorFraseDoDia.php';
use frase\LeitorFraseDoDia;

class Leitor implements LeitorFraseDoDia {
  function ler(): string {
    $data = file_get_contents('frases.txt');
    $frases = explode("\n", $data);
    $max = count($frases);
    $random = rand(1,$max);
    return $frases[$random - 1];
  }
}

$x = new Leitor;
echo $x->ler();

?>