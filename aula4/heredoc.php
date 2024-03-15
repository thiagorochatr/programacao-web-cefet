<?php
// EXERCÍCIO 1
// Dado o array abaixo, gere uma tabela HTML que apresente
// seus dados. Use heredoc na solução.
// EXERCÍCIO 2
// Adiciona, à tabela criada anteriomente, um rodapé
// que contenha o somatório do estoque e a média dos
// preços dos produtos, nas respectivas colunas.
// Use heredoc na solução.

$produtos = [
  [
    'descricao' => 'Guaraná',
    'estoque' => 10,
    'preco' => 8.00
  ],
  [ 'descricao' => 'Coca Cola',
    'estoque' => 50,
    'preco' => 9.00
  ],
  [
    'descricao' => 'Pepsi',
    'estoque' => 20,
    'preco' => 8.50
  ],
];

function salvarParaArquivo ( $html ) {
  file_put_contents( 'produtos.html', $html );
  echo 'Salvo.', PHP_EOL;
}

$somaEstoque = 0;
$somaPrecos = 0;

$html = <<<'HTML'
  <style>
  table, th, td {
    border: 1px solid black;
    padding: 5px;
  }
  </style>
  <table>
    <thead>
      <tr>
        <th>Descrição</th>
        <th>Estoque</th>
        <th>Preço</th>
      </tr>
    </thead>
    <tbody>
HTML;

foreach ($produtos as $p) {
  $html .= <<<LINE
    <tr>
      <td>{$p['descricao']}</td>
      <td>{$p['estoque']}</td>
      <td>{$p['preco']}</td>
    </tr>
  LINE;

  $somaEstoque += $p[ 'estoque' ];
  $somaPrecos += $p[ 'preco' ];
}

$mediaProdutos = $somaPrecos/count($produtos);

$html .= <<<HTML
    </tbody>
  </table>
HTML;

$html .= <<<HTML
  <tfoot>
    <tr>
      <td>Estoque = </td>
      <td>$somaEstoque</td>
    </tr>
    <br>
    <tr>
      <td>Média = </td>
      <td>$mediaProdutos</td>
    </tr>
  </tfoot>
HTML;

salvarParaArquivo($html);
?>