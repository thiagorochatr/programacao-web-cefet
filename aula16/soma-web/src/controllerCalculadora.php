<?php
// CONTROLLER

require_once 'ViewCalculadora.php';
require_once 'ModelCalculadora.php';

class ControllerCalculadora {
  private ViewCalculadora $view;
  private ModelCalculadora $model;

  public function __construct() {
    $this->view = new ViewCalculadora();
    $this->model = new ModelCalculadora();
  }

  public function realizarSoma(): void {
    $n1 = $this->view->numero('1');
    $n2 = $this->view->numero('2');
    try {
      $resultado = $this->model->somar($n1, $n2);
      $this->view->mostrarResultado($resultado);
    } catch (Exception $e) {
      $this->view->mostrarExcecao($e);
    }
  }
}
?>