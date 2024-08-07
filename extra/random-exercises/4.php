<?php
// EXERCÍCIO:
// Menu para cadastrar, listar e remover contatos.
// 1) Crie a opção para ALTERAR um contato. Para isso,
//    faça como a opção REMOVER e solicite a posição do
//    contato a ser alterada. Então, os dados.
// 2) Crie uma validação para os contatos, com as seguintes
//    regras:
//    a) o nome deve ter de 2 a 100 caracteres;
//    b) o telefone deve ter no máximo 10 caracteres.
//    Crie uma única função de validação e a reutilize
//    nas operações de cadastro e alteração.
//    Se os dados não passarem na validação, informe o
//    usuário e não realize a operação de cadastro/alteração.

const OP_SAIR = '0';
const OP_LISTAR = '1';
const OP_CADASTRAR = '2';
const OP_REMOVER = '3';
const OP_ALTERAR = '4';
const OP_SALVAR = '5';
const OP_CARREGAR = '6';

$contatos = [];

do {
  echo "Menu:" . PHP_EOL;
  echo str_repeat( '-', 15 ), PHP_EOL; // Linha
  echo '0) Sair' . PHP_EOL;
  echo '1) Listar' . PHP_EOL;
  echo '2) Cadastrar' . PHP_EOL;
  echo '3) Remover' . PHP_EOL;
  echo '4) Alterar' . PHP_EOL;
  echo '5) Salvar para arquivo' . PHP_EOL;
  echo '6) Carregar de arquivo' . PHP_EOL;
  echo str_repeat( '-', 15 ), PHP_EOL; // Linha
  $op = readline("Opção: ");
  switch($op) {
    case OP_SAIR: break;
    case OP_LISTAR: listar($contatos); break;
    case OP_CADASTRAR: cadastrar($contatos); break;
    case OP_REMOVER: remover($contatos); break;
    case OP_ALTERAR: alterar($contatos); break;
    case OP_SALVAR: salvarParaArquivo($contatos); break;
    case OP_CARREGAR: $contatos = carregarDeArquivo(); break;
    default: echo "Opção inválida." . PHP_EOL;
  }
} while ($op != OP_SAIR);

function cadastrar(&$contatos) {
  echo "Cadastrar contato" . PHP_EOL;
  echo str_repeat( '-', 15 ), PHP_EOL; // Linha
  $nome = readline("Nome: ");
  $tel = readline("Telefone: ");

  $problemas = validarDadosContato($nome, $tel);
  if(count($problemas) > 0) {
    echo implode(PHP_EOL, $problemas);
  } else {
    $contato = ['nome' => $nome, 'telefone' => $tel];
    $contatos[] = $contato;
  }
}

function listar($contatos) {
  echo "Listagem" . PHP_EOL;
  echo str_repeat( '-', 15 ), PHP_EOL; // Linha
  foreach($contatos as $i => $c) {
    echo $i + 1 . ') ' . $c['nome'] . ' - ' . $c['telefone'] . PHP_EOL;
  }
  echo str_repeat( '-', 15 ), PHP_EOL; // Linha
}

function remover(&$contatos) {
  echo "Remover contato" . PHP_EOL;
  echo str_repeat( '-', 15 ), PHP_EOL; // Linha
  $pos = solicitarPosicao($contatos);
  if($pos >= 0) {
    unset($contatos[$pos]);
    echo "Removido.";
  } else {
    echo "Posição inválida.";
  }
}

function alterar(&$contatos) {
  echo "Alterar contato" . PHP_EOL;
  echo str_repeat( '-', 15 ), PHP_EOL; // Linha
  $pos = solicitarPosicao($contatos);
  if($pos >= 0) {
    $nome = readline("Novo nome: ");
    $telefone = readline("Novo telefone: ");

    $problemas = validarDadosContato($nome, $telefone);

    if(count($problemas) > 0) {
      echo implode(PHP_EOL, $problemas);
    } else {
      $contatos[$pos]['nome'] = $nome;
      $contatos[$pos]['telefone'] = $telefone;
      echo "Alterado.";
    }
  } else {
    echo "Posição inválida.";
  }
}

function salvarParaArquivo($contatos) {
  $json = json_encode($contatos, JSON_PRETTY_PRINT);
  file_put_contents('4_contatos.json', $json);
  echo "Salvo." . PHP_EOL;
}

function carregarDeArquivo() {
  $json = file_get_contents('4_contatos.json');
  echo "Carregado." . PHP_EOL;
  return json_decode($json, true);
}

function solicitarPosicao($contatos) {
  $pos = readline("Posição: ");
  if(is_numeric($pos) && array_key_exists($pos - 1, $contatos)) {
    return (int) $pos - 1;
  }
  return -1;
}

/**
 * @param string $nome
 * @param string @tel
 * @return array<string>
 */
function validarDadosContato($nome, $tel) {
  $problemas = [];

  $tamanhoNome = mb_strlen($nome);
  if($tamanhoNome < 2) {
    $problemas[] = 'O nome deve ter 2 ou mais caracteres.';
  } else if ($tamanhoNome > 100) {
    $problemas[] = 'O nome não deve ter mais de 100 caracteres.';
  }

  if(mb_strlen($tel) > 10) {
    $problemas[] = 'O telefone pode ter no máximo 10 números.';
  }

  return $problemas;
}
?>