<?php

namespace acme\Models;

class Fornecedor {
  public int $id = 0;
  public string $codigo = '';
  public string $nome = '';
  public string $email = '';
  public string $cnpj = '';
  public string $telefone = '';

  public function __construct(array $dados = []) {
    $this->id = valor($dados, 'id', 0);    
    $this->codigo = valor($dados, 'codigo', '');    
    $this->nome = valor($dados, 'nome', '');    
    $this->cnpj = valor($dados, 'cnpj', '');    
    $this->email = valor($dados, 'email', '');    
    $this->telefone = valor($dados, 'telefone', '');    
  }
}
  
function valor(array $a, $chave, $default) {
  return htmlspecialchars(isset($a[$chave]) ? $a[$chave] : $default);
}


?>