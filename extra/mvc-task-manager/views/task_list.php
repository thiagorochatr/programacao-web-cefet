<?php

class TaskList {
  function showTaskTable($tasks) {
    $html = <<<HTML
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Done</th>
            <th>Created Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
    HTML;

    foreach($tasks as $t) {
      $doneEmoji = $t['done'] ? '✅' : '❌';
      
      $updateForm = '';
      if (!$t['done']) {
        $updateForm = <<<HTML
          <form method="POST" action="http://localhost:8080/index.php/tasks">
            <input type="hidden" name="_method" value="UPDATE">
            <input type="hidden" name="id" id="id" value="{$t['id']}">
            <input type="submit" value="Marcar como feita">
          </form>
        HTML;
      }
    
      $html .= <<<HTML
        <tr>
          <td>{$t['id']}</td>
          <td>{$t['title']}</td>
          <td>{$t['description']}</td>
          <td>{$doneEmoji}</td>
          <td>{$t['created_at']}</td>
          <td>
            {$updateForm}
            <form method="POST" action="http://localhost:8080/index.php/tasks">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="id" id="id" value="{$t['id']}">
              <input type="submit" value="Remover task">
            </form>
          </td>
        </tr>
      HTML;
    }

    $html .= <<<HTML
      </tbody>
      </table>
    HTML;

    echo $html;
  }
}

?>