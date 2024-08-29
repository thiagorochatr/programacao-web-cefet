<?php

namespace acme\Models;

use PDOException;

require_once 'Fornecedor.php';

// Todos os métodos devem lançar apenas a exceção do tipo RepositorioExecption.
class RepositorioFornecedorEmBDR implements RepositorioFornecedor {

  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }
  
  // Retorna um array de objetos de Fornecedor.
  function todos(string $filtro = '') {
    try {
      $pdo = $this->pdo;
      $sql = "SELECT * FROM fornecedor WHERE 
                id LIKE :filtro OR
                codigo LIKE :filtro OR
                nome LIKE :filtro OR
                cnpj LIKE :filtro OR
                email LIKE :filtro OR
                telefone LIKE :filtro";
      $ps = $pdo->prepare($sql);
      $ps->execute(['filtro' => "%$filtro%"]);

      return $ps->fetchAll(\PDO::FETCH_CLASS, Fornecedor::class);

    } catch (PDOException $e) {
      throw new RepositorioException($e->getMessage());
    }
  }
  
  // O fornecedor recebido deve ganhar o ID gerado pelo meio de persistência.
  function cadastrar(Fornecedor &$fornecedor) {
    try {
      $pdo = $this->pdo;
      $ps = $pdo->prepare('INSERT INTO fornecedor (codigo, nome, cnpj, email, telefone) VALUES (?,?,?,?,?)');
      $ps->execute(
        $fornecedor->codigo,
        $fornecedor->nome,
        $fornecedor->cnpj,
        $fornecedor->email,
        $fornecedor->telefone
      );
      $fornecedor->id = (int) $pdo->lastInsertId();
    } catch (PDOException $e) {
      throw new RepositorioException($e->getMessage());
    }
  }
  
  // O ID do fornecedor não deve ser atualizado.
  function atualizar(Fornecedor $fornecedor) {
    try {
      $pdo = $this->pdo;
      $ps = $pdo->prepare('UPDATE fornecedor SET codigo=?, nome=?, cnpj=?, email=?, telefone=? WHERE id = ?');
      $ps->execute([
        $fornecedor->codigo,
        $fornecedor->nome,
        $fornecedor->cnpj,
        $fornecedor->email,
        $fornecedor->telefone,
        $fornecedor->id
      ]);

      if($ps->rowCount() === 0) {
        throw new RepositorioException('Fornecedor não encontrado.');
      }

    } catch (PDOException $e) {
      throw new RepositorioException($e->getMessage());
    }
  }
  
  // Remove pelo id ou pelo código.
  function remover(string $idOuCodigo) {
    try {
      $pdo = $this->pdo;
      $ps = $pdo->prepare('DELETE FROM fornecedor WHERE id = ? OR codigo = ?');
      $ps->execute([
        $idOuCodigo,
        $idOuCodigo
      ]);

      if($ps->rowCount() === 0) {
        throw new RepositorioException('Fornecedor não encontrado.');
      }
    } catch (PDOException $e) {
      throw new RepositorioException($e->getMessage());
    }
  }
}

?>