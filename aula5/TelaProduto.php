<?php

// Crie uma classe TelaProduto que contenha um método obterProduto(), que retorna uma instância de produto com os dados lidos do usuário.
// Adicione à classe TelaProduto um método mostrarProdutos() que receba um array de objetos de Produto e exiba-os para o usuário.
// Adiciona à classe TelaProduto um método menu(), que exiba um menu como o abaixo e retorne a opção selecionada pelo usuário:
// MENU
// 0) Sair
// 1) Listar
// 2) Cadastrar

require_once 'Produto.php';

class TelaProduto {

  public function obterProduto() {
    $codigo = readline('Digite o código: ');
    $descricao = readline('Digite a descrição: ');
    $preco = floatval(readline('Digite o preço: '));
    $estoque = intval(readline('Digite o estoque: '));

    return new Produto($codigo, $descricao, $preco, $estoque);
  }

  /**
   * @param array<Produto> $produtos Produtos a serem salvos.
   */
  public function mostrarProdutos($produtos) {
    foreach ($produtos as $p) {
      echo $p->codigo . ' - ' . $p->descricao . ' - ' . $p->preco . ' - ' . $p->estoque . PHP_EOL;
    }
  }

  public function menu() {
    $prod = [];
    do{
      echo PHP_EOL . 'MENU' . PHP_EOL;
      echo '0) Sair' . PHP_EOL;
      echo '1) Listar' . PHP_EOL;
      echo '2) Cadastrar' . PHP_EOL;
      $x = readline();
      switch ($x) {
        case 1: {
          print_r($this->mostrarProdutos($prod));
        }; break;
        case 2: {
          $p = $this->obterProduto();
          $prod [] = $p;
        }; break;
        case 0: {
          echo 'Tchau.', PHP_EOL;
        }; break;
        default: {
          echo 'Opção inválida.', PHP_EOL;
        };
      }
    } while ($x != 0);
  }

}

// $telaProduto = new TelaProduto();
// $telaProduto->menu();

?>