<?php

require_once 'src/ControllerCalculadora.php';

$controller = new ControllerCalculadora();
$output = $controller->realizarOperacao();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora MVC</title>
</head>
<body>
    <h1>Calculadora MVC - Soma</h1>
    <?php echo $output; ?>
</body>
</html>