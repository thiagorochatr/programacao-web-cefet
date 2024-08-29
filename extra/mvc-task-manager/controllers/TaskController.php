<?php

require_once 'conexao.php';
require_once 'models/RepositorioTaskEmBDR.php';
require_once 'views/task_list.php';

class TaskController {
  private $viewTaskList;
  private $repositorio;

  public function __construct() {
    $this->viewTaskList = new TaskList();
    $this->repositorio = new RepositorioTaskEmBDR(conexao());
  }

  function index() { // List all tasks
    $tasks = $this->repositorio->getTasks();
    $this->viewTaskList->Hello();
  }




// - create() - Show the form to create a new task
// - store() - Save a new task to the database
// - edit() - Show the form to edit an existing task
// - update() - Update an existing task in the database
// - delete() - Delete a task from the database
}

?>