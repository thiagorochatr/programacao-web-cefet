<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Manager</title>
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

if (mb_strpos($url, '/tasks') !== false) {

  if ($metodo === 'GET') {

    http_response_code(200);
    $controller->create();
    $controller->index();

  } else if ($metodo === 'POST') {

    if (!isset($_POST['_method'])) {

      $controller->store();
      http_response_code(302); // Redirect status code
      header('Location: index.php/tasks');
      exit();

    } else if ($_POST['_method'] === 'DELETE') {
      
      $controller->delete();
      http_response_code(302); // Redirect status code
      header('Location: index.php/tasks');
      exit();

    } else if ($_POST['_method'] === 'UPDATE') {
      
      echo '<p>Update</p>';

    }

  }

} else {

  http_response_code(404);
  die ('Não encontrado.');

}

?>
