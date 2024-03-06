<?php
if (extension_loaded('tokenizer')) {
  echo "A extensão tokenizer está habilitada.\n";
} else {
  echo "A extensão tokenizer não está habilitada\n.";
}

$code1 = '<?php $x = 10 + 5; echo "X: ", $x; ?>';
$code2= '<?php echo "Hello, World!"; ?>';

$tokens = token_get_all($code1);

print_r($tokens);

foreach ($tokens as $token) {
  if (is_array($token)) {
    echo token_name($token[0]) . " => " . $token[1] . PHP_EOL;
  } else {
    echo $token . PHP_EOL;
  }
}
?>