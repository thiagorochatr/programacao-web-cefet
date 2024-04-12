<?php

namespace acme1;
require_once 'Cliente.php';

interface RepositorioCliente {
  function adicionar(Cliente &$c): void;
  function removerPeloId(int $id): void;
  /**
   * @return array<Cliente>
   */
  function todos();
}

?>