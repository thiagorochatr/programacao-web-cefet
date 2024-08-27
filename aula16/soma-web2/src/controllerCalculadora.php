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

  public function realizarOperacao() {
    $output = $this->view->mostrarFormulario();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $n1 = isset($_POST['n1']) ? $_POST['n1'] : '0';
        $n2 = isset($_POST['n2']) ? $_POST['n2'] : '0';
        $op = isset($_POST['op']) ? $_POST['op'] : 'somar';

        try {
          $resultado = $this->model->realizarOperacao($op, $n1, $n2);
          $this->view->mostrarResultado($resultado);
        } catch (Exception $e) {
          $this->view->mostrarExcecao($e);
        }

        $output .= $this->view->mostrarResultado($resultado);
    }

    return $output;
  }

}
?>