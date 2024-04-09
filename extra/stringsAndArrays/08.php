<?php

function removerPontuacao($texto) {
  $texto = preg_replace('/\s+/u', '', $texto);
  $texto = preg_replace('/[,-.;:!?]/u', '', $texto);
  
  return $texto;
}

echo removerPontuacao("! oi - oi!!! oi :o?i");

?>