<?php
require_once 'Conta.php';

interface RepositorioConta {

    /**
     * Retorna todas as contas.
     * 
     * @return array<Conta>
     */
    public function obterTodos();

    /**
     * Adiciona uma conta ao repositório.
     * 
     * @param Conta $c Conta a ser adicionada.
     */
    public function adicionar( Conta $c );

    /**
     * Remove uma conta pelo seu id.
     * 
     * @param string $id Id da conta a remover.
     */
    public function removerPeloId( $id );
}