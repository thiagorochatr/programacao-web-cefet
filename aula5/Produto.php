<?php

// Crie uma classe Produto que represente um produto contendo código, descrição, estoque e preço. Não crie getters e setters para a classe. Adicione um método validar() que valide os atributos do próprio objeto, segundo as regras a seguir (use as funções de string, etc. para isso). O método deve retornar um array que contenha todos os problemas encontrados. Se nenhum problema for encontrado, retorne um array vazio:
// a) O código deve ter 6 caracteres numéricos (ex. "000001");
// b) A descrição deve ter entre 2 e 100 caracteres;
// c) O preço deve ser um número igual ou superior a 0,01.
// d) O estoque deve ser um numero e ser no mínimo zero.

// Crie um construtor capaz de inicializar todos os atributos da classe. Faça com que certos valores default sejam assumidos, caso o usuário não os forneça.

class ProdutoException extends Exception {}

class Produto {
  
  public string $codigo;
  public string $descricao;
  public float $preco;
  public int $estoque;

  public function __construct(
    $codigo,
    $descricao,
    $preco,
    $estoque = 0
  ) {
    $this->codigo = $codigo;
    $this->descricao = $descricao;
    $this->preco = $preco;
    $this->estoque = $estoque;

    // $erros = $this->validar();
    // if (!empty($erros)) {
    //   $this->codigo = '';
    //   $this->descricao = '';
    //   $this->preco = 0;
    //   $this->estoque = 0;
    //   echo "Erro ao criar produto:\n";
    //   foreach ($erros as $erro) {
    //     echo "- $erro\n";
    //   }
    // } else {
    //   echo "Produto criado.\n";
    // }

    $erros = $this->validar();
    if (!empty($erros)) {
      throw new ProdutoException(PHP_EOL . "Erro ao criar produto: " . PHP_EOL . '- ' . implode(PHP_EOL.'- ', $erros) . PHP_EOL);
    } else {
      echo "Produto criado.\n";
    }
  }

  public function validar(): array {
    $rtn = [];

    if (mb_strlen($this->codigo) != 6 OR !is_numeric($this->codigo)) {
      $rtn [] = 'O código deve ter 6 caracteres numéricos.';
    }
    if (mb_strlen($this->descricao) <= 2 OR mb_strlen($this->descricao) >= 100) {
      $rtn [] = 'A descrição deve ter entre 2 e 100 caracteres.';
    }
    if ($this->preco < 0.01 OR !is_numeric($this->preco)) {
      $rtn [] = 'O preço deve ser um número igual ou superior a 0,01.';
    }
    if (!is_int($this->estoque) OR $this->estoque < 0) {
      $rtn [] = 'O estoque deve ser um numero e ser no mínimo zero.';
    }

    return $rtn;
  }

}

// $x = new Produto('000000', 'Teste', 1, 1);
// print_r($x);

?>