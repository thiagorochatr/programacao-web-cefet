<?php

$baseData = ["a"=>3, 0=>0, "b"=> 7, "c"=>2, 1=>5, "d"=>2, 2=>-1, 3=>0, 4=>-2, "e"=>-5];

function somaSeparada($db) {
  $arr = ['letras' => 0, 'numeros' => 0];
  foreach($db as $i=>$v) {
    if(is_numeric($i)) {
      $arr['numeros'] += $v;
    } else {
      $arr['letras'] += $v;
    }
  }
  return $arr;
}

print_r(somaSeparada($baseData));

?>