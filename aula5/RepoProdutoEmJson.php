<?php

// Crie uma implementação para a interface InterfaceProduto que utilize o formato JSON. Para isso, devem ser úteis as funções PHP abaixo:
// json_encode(), que recebe um objeto ou array e o transforma em uma string no formato JSON;
// json_decode(), que recebe uma string em formato JSON e a transforma em um objeto ou array;
// file_get_contents(), que recebe o nome de um arquivo e retorna seu conteúdo como uma string;
// file_put_contents(), que recebe o nome de um arquivo e uma string e a salva.


require_once 'InterfaceProduto.php';
require_once 'Produto.php';

class RepoProdutoEmJson implements InterfaceProduto {

  public function carregarProdutos() {
    $file = file_get_contents('produtos.json');
    $arr = json_decode($file);
    $produtos = [];
    foreach ($arr as $a) {
      $produtos [] = new Produto(
        $a->codigo, $a->descricao, $a->preco, $a->estoque
      );
    }
    return $produtos;
  }

  public function persistirProdutos($produtos): void {
    $json = json_encode($produtos);
    file_put_contents('produtos.json', $json);
  }

}

// $x = new RepoProdutoEmJson();
// print_r($x->carregarProdutos());

?>