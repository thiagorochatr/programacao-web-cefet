<?php

use erro\RepositorioException;
require_once 'RepositorioException.php';
require_once 'Cargo.php';
require_once 'Funcionario.php';
require_once 'RepositorioFuncionario.php'; // ERREI ISSO

class RepositorioFuncionarioEmBDR implements RepositorioFuncionario {
  private $pdo;
  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  function adicionar(Funcionario &$f) {
    try {
      $pdo = $this->pdo;
      $ps = $pdo->prepare('INSERT INTO funcionario (nome, salario, cargo_id) VALUES (?, ?, ?)');
      $ps->execute([
        $f->nome,
        $f->salario,
        $f->cargo->id
      ]);
      $f->id = $pdo->lastInsertId();

    } catch (PDOException $e) {
      throw new RepositorioException('Erro: ' . $e->getMessage());
    }
  }

  function atualizarSalarios($nomeDoCargo, $percentual) {
    $pdo = $this->pdo; // ERREI ISSO
    try {
      $pdo->beginTransaction();
      $ps = $pdo->prepare('SELECT id FROM cargo WHERE nome = ?');
      $ps->execute([$nomeDoCargo]);
      $cargoIDBD = $ps->fetch();
      $cargoId = $cargoIDBD['id'];
      $ps = $pdo->prepare('SELECT * FROM funcionario WHERE cargo_id = ?');
      $ps->execute([$cargoId]);
      $funcionarios = $ps->fetchAll();
      foreach($funcionarios as $f) {
        $aumento = ($f['salario']*$percentual)/100;
        $salarioNovo = $f['salario'] + $aumento;
        $ps = $pdo->prepare('UPDATE funcionario SET salario = ? WHERE id = ?');  // ERREI ISSO
        $ps->execute([$salarioNovo, $f['id']]);
      }
      $pdo->commit();

    } catch (PDOException $e) {
      if($pdo->inTransaction()) {
        $pdo->rollBack();
      }
      throw new RepositorioException('Erro: ' . $e->getMessage());
    }
  }

  function removerPeloId($id) {
    try {
      $pdo = $this->pdo;
      $ps = $pdo->prepare('SELECT id FROM funcionario WHERE id = ?');
      $ps->execute([$id]);
      $ps->fetch();
      if($ps->rowCount() != 1) {
        return false;
      }
      $ps = $pdo->prepare('DELETE FROM funcionario WHERE id = ?');
      $ps->execute([$id]);
      $ps = $pdo->prepare('SELECT id FROM funcionario WHERE id = ?');
      $ps->execute([$id]);
      $ps->fetch();
      if($ps->rowCount() == 0) {
        return true;
      } else {
        return false;
      }
    } catch (PDOException $e) {
      throw new RepositorioException('Erro: ' . $e->getMessage());
    }
  }

  function todos() {
    try {
      $pdo = $this->pdo;
      $ps = $pdo->prepare('SELECT * FROM funcionario');
      $ps->execute();
      $data = $ps->fetchAll();
      $funcionarios = [];
      foreach($data as $d) {
        $ps = $pdo->prepare('SELECT * FROM cargo WHERE id = ?');
        $ps->execute([$d['cargo_id']]);
        $cargoBD = $ps->fetch();
        $cargo = new Cargo($cargoBD['id'], $cargoBD['nome']);
        $f = new Funcionario($d['id'], $d['nome'], $d['salario'], $cargo);
        $funcionarios[] = $f;
      }
      return $funcionarios;
    } catch (PDOException $e) {
      throw new RepositorioException('Erro: ' . $e->getMessage());
    }
  }

}

?>