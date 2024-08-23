<?php

class ControladoraConta {
  function cadastrarConta() {
    $dados = $this->view->dadosConta();
    try {
      $this->gestor->adicionarConta($dados);
      $this->view->mostrarSalvoComSucesso();
    } catch (Exception $e) {
      $this->view->mostrarExcecao($e);
    }
  }
}



?>