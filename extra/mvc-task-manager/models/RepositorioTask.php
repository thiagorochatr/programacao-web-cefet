<?php

require_once 'Task.php';

interface RepositorioTask {
  function getTasks(); // List all tasks. Como objeto da classe Task.
  
  function getTaskByID(int $id);

  function createTask(Task &$t); // Create a new task and save to the database. Receber o ID gerado pelo banco de dados.
  
  function updateTaskDoneByID(int $id); // Update an existing task in the database.
  
  function deleteTaskByID(int $id); // Delete a task from the database.
}

?>