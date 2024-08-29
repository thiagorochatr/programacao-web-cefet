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

if ($metodo === 'GET') {

  if (mb_strpos($url, '/tasks')) {
    http_response_code(200);
    $controller->create();
    $controller->index();
  } else {
    http_response_code(404);
    die ('Não encontrado.');
  }

} else if ($metodo === 'POST') {

  if (mb_strpos($url, '/tasks') && !mb_strpos($url, '/update.php') && (!$_POST['_method'] === 'DELETE' || !isset($_POST['_method']))) {
    $controller->store();
    http_response_code(302); // Redirect status code
    header('Location: index.php/tasks');
    exit();
  } else if(mb_strpos($url, '/tasks') && $_POST['_method'] === 'DELETE') {
    $controller->delete();
    http_response_code(302); // Redirect status code
    header('Location: index.php/tasks');
    exit();
  }else if (mb_strpos($url, '/update.php')) {
    echo '<p>Update</p>';
  } else {
    http_response_code(404);
    die ('Não encontrado.');
  }

} else {
  http_response_code(404);
  die ('Não encontrado.');
}

?>
