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
          </tr>
        </thead>
        <tbody>
    HTML;

    foreach($tasks as $t) {
      $doneEmoji = $t['done'] ? '✅' : '❌';

      $html .= <<<HTML
        <tr>
          <td>{$t['id']}</td>
          <td>{$t['title']}</td>
          <td>{$t['description']}</td>
          <td>{$doneEmoji}</td>
          <td>{$t['created_at']}</td>
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