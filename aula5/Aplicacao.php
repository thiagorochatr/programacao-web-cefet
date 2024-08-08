<?php

// Crie uma classe Aplicacao que receba em seu construtor um objeto a interface criada para persistir os produtos. Esse objeto deverá ser utilizado pela classe posteriormente, para carregar ou salvar os produtos. Na classe, crie um método iniciar() que seja capaz de exibir um menu para o usuário, utilizando a TelaProduto, e executar o comportamento correspondente, utilizando as classes criadas anteriormente.
// DICA: Pode ser útil que a classe contenha um array de produtos.

require_once 'Produto.php';
require_once 'InterfaceProduto.php';
require_once 'RepoProdutoEmJson.php';
require_once 'TelaProduto.php';

class Aplicacao {

  private $repositorio;
  private $produtos = [];
  private $telaProduto;

  public function __construct(InterfaceProduto $repositorio) {
    $this->repositorio = $repositorio;
    $this->telaProduto = new TelaProduto();
  }

  public function iniciar() {
    $this->produtos = $this->repositorio->carregarProdutos();
    do {
      $opcao = $this->exibirMenu();
      switch ($opcao) {
        case 0:
          echo "Encerrando aplicação...\n";
          break;
        case 1:
          $this->listarProdutos();
          break;
        case 2:
          $this->cadastrarProduto();
          $this->produtos = $this->repositorio->carregarProdutos();
          break;
        default:
          echo "Opção inválida!\n";
      }
    } while ($opcao !== 0);
  }

  private function exibirMenu() {
    echo "\nMENU\n";
    echo "0) Sair\n";
    echo "1) Listar produtos\n";
    echo "2) Cadastrar produto\n";
    echo "Escolha uma opção: ";
    return (int) readline();
  }

  private function listarProdutos() {
    $this->telaProduto->mostrarProdutos($this->produtos);
  }

  private function cadastrarProduto() {
    try {
      $novoProduto = $this->telaProduto->obterProduto();
      $this->produtos[] = $novoProduto;
      $this->repositorio->persistirProdutos($this->produtos);
      echo "Produto cadastrado com sucesso!\n";
    } catch (ProdutoException $e) {
      echo "Erro ao cadastrar produto: " . $e->getMessage() . "\n";
    }
  }

}

$repositorio = new RepoProdutoEmJson();
$aplicacao = new Aplicacao($repositorio);
$aplicacao->iniciar();

?>