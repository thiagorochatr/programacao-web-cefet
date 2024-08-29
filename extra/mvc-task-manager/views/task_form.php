<?php

class TaskForm {
  function showTaskForm() {
    $html = <<<HTML
      <form method="POST" action="http://localhost:8080/index.php/tasks">
        <input type="text" name="title" required placeholder="Título">
        <input type="text" name="description" required placeholder="Descrição">
        <input type="submit" value="Criar Task">
      </form>
    HTML;

    echo $html;
  }
}

?>