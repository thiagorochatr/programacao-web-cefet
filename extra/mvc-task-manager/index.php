<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Task Manager</h1>
</body>
</html>

<?php

require_once 'controllers/TaskController.php';

$metodo = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];

$controller = new TaskController();

if ($metodo === 'GET') {
  if (mb_strpos($url, '/tasks')) {
    $controller->create();
    $controller->index();
    http_response_code(200);
  } else {
    http_response_code(404);
    die ('Não encontrado.');
  }
} else if ($metodo === 'POST') {
  if (mb_strpos($url, '/tasks')) {
    $controller->store();
    http_response_code(200);
    header('Location: index.php/tasks');
  } else {
    http_response_code(404);
    die ('Não encontrado.');
  }
} else if ($metodo === 'PUT') {
  if (mb_strpos($url, '/tasks')) {

  } else {
    http_response_code(404);
    die ('Não encontrado.');
  }
} else if ($metodo === 'DELETE') {
  if (mb_strpos($url, '/tasks')) {

  } else {
    http_response_code(404);
    die ('Não encontrado.');
  }
} else {
  http_response_code(404);
  die ('Não encontrado.');
}

?>
