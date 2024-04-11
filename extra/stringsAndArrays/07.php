<?php

// Crie uma função removerDiacriticos que remova de um texto, fornecido por parâmetro, os diacríticos de vogais acentuadas com acento agudo, acento grave, trema, acento circunflexo e til, além de remover a cedilha da consoante c.

function removerDiacriticos($texto) {
  $texto = preg_replace('/[áàäâã]/u', 'a', $texto);
  $texto = preg_replace('/[ÁÀÄÂÃ]/u', 'A', $texto);
  $texto = preg_replace('/[éèëê]/u', 'e', $texto);
  $texto = preg_replace('/[ÉÈËÊ]/u', 'E', $texto);
  $texto = preg_replace('/[íìïî]/u', 'i', $texto);
  $texto = preg_replace('/[ÍÌÏÎ]/u', 'I', $texto);
  $texto = preg_replace('/[óòöôõ]/u', 'o', $texto);
  $texto = preg_replace('/[ÓÒÖÔÕ]/u', 'O', $texto);
  $texto = preg_replace('/[úùüû]/u', 'u', $texto);
  $texto = preg_replace('/[ÚÙÜÛ]/u', 'U', $texto);
  $texto = preg_replace('/ç/u', 'c', $texto);

  return $texto;
}

echo removerDiacriticos("café, camarões, hífen, armação");

?>