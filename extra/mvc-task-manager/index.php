<?php

require_once 'controllers/TaskController.php';

$metodo = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];

if ($metodo === 'GET') {
  if (mb_strpos($url, '/tasks')) {
    $controller = new TaskController();
    $controller->index();
  } else {
    http_response_code(404);
    die ('Não encontrado.');
  }
} else if ($metodo === 'POST') {
  if (mb_strpos($url, '/tasks')) {

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