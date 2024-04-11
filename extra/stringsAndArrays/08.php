<?php

// Crie uma função removerPontuacao que remova todos os espaços de um texto, além das seguintes pontuações: vírgula, traço, ponto, ponto-e-vírgula, dois  pontos, exclamação e ponto-de-interrogação.

function removerPontuacao($texto) {
  $texto = str_replace([' '], '', $texto);
  $texto = str_replace([',','-','.',';',':','!','?'], '', $texto);
  
  return $texto;
}

echo removerPontuacao("! oi - oi!!! oi :o?i");

?>