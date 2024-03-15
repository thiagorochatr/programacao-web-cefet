<?php

$phones = [
  '30044000',
  '2225271727',
  '08007024000',
  '22987654321',
  '30044000',
  '08007024000'
];

function phoneRepeated( $phones ) {
  $count = [];
  foreach ( $phones as $t ) {
    if ( isset( $count[ $t ] ) ) {
      $count[ $t ]++;
    } else {
      $count[ $t ] = 1;
    }
  }
  $repeated = [];
  foreach ( $count as $phone => $value ) {
    if ( $value > 1 ) {
      $repeated []= $phone;
    }
  }
  return $repeated;
}


print_r( phoneRepeated( $phones ) );

?>