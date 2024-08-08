<?php

require_once 'Carro.php';

/** Repositório de Carros. Apenas lança RepositorioException em seus métodos. */
interface RepositorioCarro {

  /**Adiciona um carro,que deve receber o id gerado pelo banco de dados */
  function adicionar (Carro &$carro ) ;

  /**Atualiza os dados de um carro, exceto seu id, que é utilizado para localizá-lo */
  function atualizar( Carro $carro );

  // function atualizarprecosEmPercentual($percentual);

  function removePeloId($id);

  /**Retorna todos os carros,Como objetos da classe Carro */
  function todos();
}

?>