<?php
class Conta {

    public $id = 0;
    public $descricao = '';
    public $valor = 0.0;

    public function __construct(
        $id = 0,
        $descricao = '',
        $valor = 0.0,
    ) {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->valor = $valor;
    }

    /**
     * Retorna os problemas encontrados.
     * @return array<string>
     */
    public function validar() {
        $problemas = [];
        if ( ! is_numeric( $this->id ) || $this->id < 0 ) {
            $problemas []= 'O id deve ser um número não negativo.';
        }
        // TODO: fazer outras validações
        return $problemas;
    }
}