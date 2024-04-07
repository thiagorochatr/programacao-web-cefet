<?php
$cars = array (
  array("Volvo",        'test' => 22,  18 ),
  array("BMW",          'test' => 15,  13 ),
  array("Saab",         'test' => 5,   2  ),
  array("Land Rover",   'test' => 17,  15 )
);
function listar( $cars ) {
  echo 'Listagem', PHP_EOL;
  foreach ( $cars as $indice => $c ) {
    echo $indice + 1, ') ', $c[ 0 ], ' - ', $c[ 'test' ], ' - ', $c[ 1 ], PHP_EOL;
  }
}
listar( $cars );
echo PHP_EOL;
echo PHP_EOL;
echo $cars[0][0].": In stock: ".$cars[0]['test'].", sold: ".$cars[0][1]. PHP_EOL ;
echo $cars[1][0].": In stock: ".$cars[1]['test'].", sold: ".$cars[1][1]. PHP_EOL ;
echo $cars[2][0].": In stock: ".$cars[2]['test'].", sold: ".$cars[2][1]. PHP_EOL ;
echo $cars[3][0].": In stock: ".$cars[3]['test'].", sold: ".$cars[3][1]. PHP_EOL ;
?>
