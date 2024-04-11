<?php

// Crie uma interface que permita abstrair a persistência de um conjunto de produtos (seu salvamento em algum local), fornecendo comportamentos para:
// a) persistir um conjunto de produtos (array);
// b) carregar um conjunto de produtos (array);

interface InterfaceProduto {

  /**
   * @param array<Produto> $produtos Produtos a serem salvos.
   */
  function persistirProdutos($produtos);

  /**
   * @return array<Produto>
   */
  function carregarProdutos();
}

?>