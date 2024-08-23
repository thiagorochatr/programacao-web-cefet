<?php

class ViewConta {
  
  function dadosConta() {
    return $_POST;
  }

  function mostrarSalvoComSucesso() {
    http_response_code(201); // Created
    die('Salvo');
  }

  function mostrarExcecao(Exception $e) {
    http_response_code(500); // Internal Server Error
    die($e->getMessage());
  }

}

?>