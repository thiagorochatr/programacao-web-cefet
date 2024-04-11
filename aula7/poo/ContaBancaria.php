<?php

require_once 'conexao.php';

class ContaBancaria {

  private $id = 0;
  private $nome = '';
  private $cpf = '';
  private $saldo = 0;

  public function __construct($id, $nome, $cpf, $saldo) {
    $this->id = $id;
    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->saldo = $saldo;
  }

  function getId() { return $this->id; }
  function setId( $id ) { $this->id = $id; }
  function getNome() { return $this->nome; }
  function setNome( $nome ) { $this->nome = $nome; }
  function getCpf() { return $this->cpf; }
  function setCpf( $cpf ) { $this->cpf = $cpf; }
  function getSaldo() { return $this->saldo; }
  function setSaldo( $saldo ) { $this->saldo = $saldo; }

}

function contasBancarias (PDO $pdo) {
  $ps = $pdo->query('SELECT * FROM conta');
  $data = $ps->fetchAll();
  $objeto = [];

  foreach($data as $d) {
    $obj = new ContaBancaria(
      $d['id'],
      $d['nome'],
      $d['cpf'],
      $d['saldo'],
    );
    $objeto [] = $obj; 
  }
  return $objeto;
}

function adicicionarContaBancaria( ContaBancaria &$conta, PDO $pdo ) {
  $ps = $pdo->prepare('INSERT INTO conta (nome, cpf, saldo) VALUES (?,?,?)');
  $ps->execute([$conta->getNome(), $conta->getCpf(), $conta->getSaldo()]);

  $conta->setId( (int) $pdo->lastInsertId()); // atualiza com o último id
}

// $pdo = criarConexao();
// $x = contasBancarias($pdo);
// print_r($x[2]);
// adicicionarContaBancaria($x[2], $pdo);
// print_r($x[2]);

?>