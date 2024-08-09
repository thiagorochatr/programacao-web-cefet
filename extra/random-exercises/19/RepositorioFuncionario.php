<?php

interface RepositorioFuncionario {
  function adicionar(Funcionario &$f);
  function atualizarSalarios($nomeDoCargo, $percentual);
  function removerPeloId($id);
  function todos();
}

?>