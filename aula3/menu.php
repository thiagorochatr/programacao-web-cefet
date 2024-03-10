<?php
// EXERCÍCIO:
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

const OPCAO_SAIR = '0';
const OPCAO_LISTAR = '1';
const OPCAO_CADASTRAR = '2';
const OPCAO_REMOVER = '3';
const OPCAO_ALTERAR = '4';
const OPCAO_SALVAR = '5';
const OPCAO_CARREGAR = '6';

$contatos = [];
do {
    echo 'Menu:', PHP_EOL;
    desenharLinha();
    echo '0) Sair', PHP_EOL;
    echo '1) Listar', PHP_EOL;
    echo '2) Cadastrar', PHP_EOL;
    echo '3) Remover', PHP_EOL;
    echo '4) Alterar', PHP_EOL;
    echo '5) Salvar para arquivo', PHP_EOL;
    echo '6) Carregar de arquivo', PHP_EOL;
    desenharLinha();
    $opcao = readline( 'Opção: ' );
    switch ( $opcao ) {
        case OPCAO_SAIR: break;
        case OPCAO_LISTAR: listar( $contatos ); break;
        case OPCAO_CADASTRAR: cadastrar( $contatos ); break;
        case OPCAO_REMOVER: remover( $contatos ); break;
        case OPCAO_ALTERAR: alterar( $contatos ); break;
        case OPCAO_SALVAR: salvarParaArquivo( $contatos ); break;
        case OPCAO_CARREGAR: $contatos = carregarDeArquivo(); break;
        default: echo 'Opção inválida.', PHP_EOL;
    }
} while ( $opcao != OPCAO_SAIR );

function cadastrar( &$contatos ) {
    echo 'Cadastro', PHP_EOL;
    desenharLinha();
    $nome = readline( 'Nome: ' );
    $telefone = readline( 'Telefone: ' );
    $problemas = validarDadosContato( $nome, $telefone );
    if ( count( $problemas ) > 0 ) {
        echo implode( PHP_EOL, $problemas );
    } else {
        $contato = [ 'nome' => $nome, 'telefone' => $telefone];
        $contatos []= $contato; // array_push( $contatos, $contato );
    }
}

function listar( $contatos ) {
    echo 'Listagem', PHP_EOL;
    desenharLinha();
    foreach ( $contatos as $indice => $c ) {
        echo $indice + 1, ') ', $c[ 'nome' ], ' - ', $c[ 'telefone' ], PHP_EOL;
    }
    desenharLinha();
}

function remover( &$contatos ) {
    echo 'Remoção', PHP_EOL;
    desenharLinha();
    $posicao = solicitarPosicao( $contatos);
    if ( $posicao >= 0) {
        unset( $contatos[ $posicao ] );
        echo 'Removido.', PHP_EOL;
    } else {
        echo 'Posição inválida.', PHP_EOL;
    }
}

function alterar( &$contatos ) {
    echo 'Alteração', PHP_EOL;
    desenharLinha();
    $posicao = solicitarPosicao( $contatos );
    if ( $posicao >= 0 ) {
        $nome = readline( 'Nome: ' );
        $telefone = readline( 'Telefone: ' );
        $problemas = validarDadosContato( $nome, $telefone );
        if ( count( $problemas ) > 0 ) {
            echo implode( PHP_EOL, $problemas );
        } else {
            $contatos[ $posicao ][ 'nome' ] = $nome;
            $contatos[ $posicao ][ 'telefone' ] = $telefone;
        }
        echo 'Alterado.', PHP_EOL;
    } else {
        echo 'Posição inválida.', PHP_EOL;
    }
}

function salvarParaArquivo ( $contatos ) {
  $json = json_encode( $contatos, JSON_PRETTY_PRINT ); // gera string
  file_put_contents( 'contatos.json', $json );
  echo 'Salvo.', PHP_EOL;
}

function carregarDeArquivo() {
  $json = file_get_contents( 'contatos.json' );
  return json_decode( $json, true ); // gera array
  echo 'Carregado.', PHP_EOL;
}

/**
 * Valida os dados de um contato.
 *
 * @param string $nome
 * @param string $telefone
 * @return array<string>
 */
function validarDadosContato( $nome, $telefone ) {
    $problemas = [];
    // Nome
    $tamanhoNome = mb_strlen( $nome );
    if ( $tamanhoNome < 2 ) {
        $problemas [] = 'Nome deve ter pelo menos 2 caracteres.';
    } else if ( $tamanhoNome > 100 ) {
        $problemas [] = 'Nome deve ter no máximo 100 caracteres.';
    }

    // Telefone
    $tamanhoTelefone = mb_strlen( $telefone );
    if ( $tamanhoTelefone > 10 ) {
        $problemas [] = 'Telefone deve ter no máximo 10 caracteres.';
    }

    return $problemas;
}

function solicitarPosicao( $contatos ) {
    $posicao = readline( 'Posição a alterar: ' );
    if ( is_numeric( $posicao ) &&
        array_key_exists( $posicao - 1, $contatos )
    ) {
        return (int) $posicao - 1;
    }
    return -1;
}

function desenharLinha() {
    echo str_repeat( '-', 20 ), PHP_EOL;
}
?>