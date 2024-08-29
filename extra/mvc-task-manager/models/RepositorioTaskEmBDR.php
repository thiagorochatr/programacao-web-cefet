<?php

require_once 'Task.php';
require_once 'TaskException.php';
require_once 'RepositorioTask.php';

class RepositorioTaskEmBDR implements RepositorioTask {
  private PDO $pdo;

  public function __construct(PDO $pdo) {
    $this->pdo = $pdo;
  }

  function getTasks() {
    try {
      $pdo = $this->pdo;
      $ps = $pdo->prepare('SELECT * FROM tasks');
      $ps->execute();
      $tasks = $ps->fetchAll();
      return $tasks;
    } catch (PDOException $e) {
      throw new TaskException($e->getMessage());
    }
  } // List all tasks. Como objeto da classe Task.

  function getTaskByID(int $id) {
    try {
      $pdo = $this->pdo;
      $ps = $pdo->prepare('SELECT * FROM tasks WHERE id = ?');
      $ps->execute([$id]);
      $task = $ps->fetch();
      return $task;
    } catch (PDOException $e) {
      throw new TaskException($e->getMessage());
    }
  } // List all tasks. Como objeto da classe Task.
  
  function createTask(Task &$t) {
    try {
      $pdo = $this->pdo;
      $ps = $pdo->prepare('INSERT INTO tasks (title, description) VALUES (?,?)');
      $ps->execute([
        $t->title,
        $t->description
      ]);
      $t->id = (int) $pdo->lastInsertId();
    } catch (PDOException $e) {
      throw new TaskException($e->getMessage());
    }
  } // Create a new task and save to the database. Receber o ID gerado pelo banco de dados.
  
  function updateTaskDoneByID(int $id) {
    try {
      $pdo = $this->pdo;
      $ps = $pdo->prepare('UPDATE tasks SET done = ?, updated_at = ? WHERE id = ?');
      $ps->execute([
        1,
        (new DateTime())->format('Y-m-d H:i:s'),
        $id
      ]);
    } catch (PDOException $e) {
      throw new TaskException($e->getMessage());
    }
  } // Update an existing task in the database.
  
  function deleteTaskByID(int $id) {
    try {
      $pdo = $this->pdo;
      $ps = $pdo->prepare('DELETE FROM tasks WHERE id = ?');
      $ps->execute([$id]);
    } catch (PDOException $e) {
      throw new TaskException($e->getMessage());
    }
  } // Delete a task from the database.


}

?>