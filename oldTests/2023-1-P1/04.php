<?php

function format($tel): string {
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