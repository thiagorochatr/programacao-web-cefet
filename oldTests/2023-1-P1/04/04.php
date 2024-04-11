<?php

// Faça uma função para formatar um número de telefone (string) recebido como argumento que, somente se o número contiver 10 ou 11 caracteres e esses forem numéricos, a função deve retornar o telefone formatado. Do contrário, deve retornar uma string vazia. O formato do telefone para quando esse tiver 10 caracteres (ex. 2225271727) é "(22) 2527-1727". O formato para quando tiver 11 caracteres (ex. 22988776655") é "(22) 98877-6655".

function format(string $tel): string {
  if (is_numeric($tel) AND (mb_strlen($tel) == 10 OR mb_strlen($tel) == 11)) {
    if (mb_strlen($tel) == 10) {
      $tel = '(' . mb_substr($tel, 0, 2) . ') ' . mb_substr($tel, 2, 4) . '-' . mb_substr($tel, 6);
    } else {
      $tel = '(' . mb_substr($tel, 0, 2) . ') ' . mb_substr($tel, 2, 5) . '-' . mb_substr($tel, 7);
    }
    return $tel;
  } else {
    return '';
  }
}

echo format('2225271727') . PHP_EOL;
echo format('22988776655') . PHP_EOL;

?>