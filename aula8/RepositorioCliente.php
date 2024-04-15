<?php

namespace acme1;
require_once 'Cliente.php';

interface RepositorioCliente {
  /**
   * @throws RepositorioException
   */
  function adicionar(Cliente &$c): void;
  /**
   * @throws RepositorioException
   */
  function removerPeloId(int $id): void;
  /**
   * @return array<Cliente>
   * @throws RepositorioException
   */
  function todos();
}

?>