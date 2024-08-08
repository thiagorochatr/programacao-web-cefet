<?php

function format(string $tel): string {
  if(is_numeric($tel) && (mb_strlen($tel) === 10 || mb_strlen($tel) === 11)) {
    if(mb_strlen($tel) === 10) {
      return '(' . mb_substr($tel, 0, 2) . ') ' . mb_substr($tel, 2, 4) . '-' . mb_substr($tel, 6);
    } else {
      return '(' . mb_substr($tel, 0, 2) . ') ' . mb_substr($tel, 2, 5) . '-' . mb_substr($tel, 7);
    }
  } else {
    return '';
  }
}

echo format('1234') . PHP_EOL;
echo format('1234567890') . PHP_EOL;
echo format('01234567890') . PHP_EOL;

?>