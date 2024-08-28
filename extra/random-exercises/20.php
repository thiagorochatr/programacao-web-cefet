<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <p>
    Agora são
    <?php
    $d = new DateTime();
    echo $d->format('H:i');
    ?>
    do dia
    <?php
    echo $d->format('d/m/Y');
    ?>
  </p>
</body>
</html>