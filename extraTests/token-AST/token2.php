<?php

$code = '<?php
$months = [
  "firstMonth" => "january",
  "secondMonth" => "february",
  "thirdMonth" => "march"
];
?>';

$tokens = token_get_all($code);

print_r($tokens);

foreach ($tokens as $token) {
  if (is_array($token)) {
    echo token_name($token[0]) . " => " . $token[1] . PHP_EOL;
  } else {
    echo $token . PHP_EOL;
  }
}
?>