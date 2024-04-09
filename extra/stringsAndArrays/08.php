<?php

function removerPontuacao($texto) {
  $texto = str_replace([' '], '', $texto);
  $texto = str_replace([',','-','.',';',':','!','?'], '', $texto);
  
  return $texto;
}

echo removerPontuacao("! oi - oi!!! oi :o?i");

?>