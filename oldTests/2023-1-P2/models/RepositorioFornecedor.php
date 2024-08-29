<?php

namespace acme\Models;
require_once 'Fornecedor.php';

class RepositorioException extends \RuntimeException {}

// Todos os métodos devem lançar apenas a exceção do tipo RepositorioExecption.
interface RepositorioFornecedor {
  // Retorna um array de objetos de Fornecedor.
  function todos(string $filtro = '');
  
  // O fornecedor recebido deve ganhar o ID gerado pelo meio de persistência.
  function cadastrar(Fornecedor &$fornecedor);
  
  // O ID do fornecedor não deve ser atualizado.
  function atualizar(Fornecedor $fornecedor);
  
  // Remove pelo id ou pelo código.
  function remover(string $idOuCodigo);
}

?>