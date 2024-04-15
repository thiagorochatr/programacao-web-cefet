<?php

require_once 'RepositorioClienteEmBDR.php';
require_once 'Cliente.php';
require_once 'Telefone.php';

use acme1\Cliente;
use acme1\RepositorioClienteEmBDR;
use acme1\Telefone;

function menu($pdo) {
  $repo = new RepositorioClienteEmBDR($pdo);
  do{
    echo PHP_EOL, 'MENU', PHP_EOL, str_repeat( '-', 40 ), PHP_EOL;
    echo '0) Sair' . PHP_EOL;
    echo '1) Cadastrar' . PHP_EOL;
    echo '2) Listar' . PHP_EOL;
    echo '3) Remover' . PHP_EOL;
    $x = readline();
    switch ($x) {
      case 1: {
        cadastrar($repo);
      }; break;
      case 2: {
        listar($repo);
      }; break;
      case 3: {
        remover($repo);
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

function cadastrar($repo) {
  $nome = readline('Nome: ');
  $arrTel = [];
  do {
    $tel = readline('Telefone (qq coisa para sair): ');
    if(mb_strlen($tel) == 11 AND is_numeric($tel)) {
      $x = new Telefone($tel);
      $arrTel [] = $x;
    }
  } while (mb_strlen($tel) == 11 AND is_numeric($tel));
  $cliente = new Cliente($nome, $arrTel);

  $prblms = $cliente->validar();
  if (!empty($prblms)){
    echo implode("\n", $prblms);
    return;
  }

  try {
    $repo->adicionar($cliente);
  } catch (Exception $e) {
    echo $e->getMessage(), PHP_EOL;
  }
}

function listar($repo) {
  try {
    $data = $repo->todos();
  } catch (Exception $e) {
    echo $e->getMessage(), PHP_EOL;
  }
  $tels = $data[0];
  $clientes = $data[1];

  foreach($clientes as $i=>$c) {
    echo $c['nome'] . ' -> ';
    foreach($tels[$i] as $t) {
      echo $t['numero'] . ' ';
    }
    echo PHP_EOL;
  }
}

function remover($repo) {
  $id = readline('Id: ');
  try {
    $repo->removerPeloId($id);
  } catch (Exception $e) {
    echo $e->getMessage(), PHP_EOL;
  }
}

function connectDB() {
  $pdo = null;
  try {
    $pdo = new PDO(
      'mysql:dbname=acme1;host=localhost;charset=utf8',
      'root',
      getenv('db_pass'),
      [
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
      ]
    );
  } catch (PDOException $e) {
    die('Erro: ' . $e->getMessage());
  }
  return $pdo;
}

$pdo = connectDB();
menu($pdo);

?>