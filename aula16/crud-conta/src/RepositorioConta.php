<?php

require_once 'Conta.php';

interface RepositorioConta {
  function adicionar(Conta $conta);
}

?>