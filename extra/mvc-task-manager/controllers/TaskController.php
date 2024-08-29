<?php

require_once 'conexao.php';
require_once 'models/RepositorioTaskEmBDR.php';
require_once 'views/task_list.php';
require_once 'views/task_form.php';

class TaskController {
  private $viewTaskList;
  private $viewTaskForm;
  private $repositorio;

  public function __construct() {
    $this->viewTaskList = new TaskList();
    $this->viewTaskForm = new TaskForm();
    $this->repositorio = new RepositorioTaskEmBDR(conexao());
  }

  function index() { // List all tasks
    $tasks = $this->repositorio->getTasks();
    $this->viewTaskList->showTaskTable($tasks);
  }
  
  function create() { //Show the form to create a new task
    $this->viewTaskForm->showTaskForm();
  }
  
  function store() { // Save a new task to the database
    if(empty($_POST['title'])) {
      throw new TaskException('Título é obrigatório.');
    }
    if(mb_strlen($_POST['title'] < 100)) {
      throw new TaskException('Título tem que ter menos de 100 caracteres.');
    }
    $task = new Task(
      0,
      htmlspecialchars($_POST['title']),
      htmlspecialchars($_POST['description']),
    );

    $this->repositorio->createTask($task);
  }


// - edit() - Show the form to edit an existing task
// - update() - Update an existing task in the database
// - delete() - Delete a task from the database
}

?>