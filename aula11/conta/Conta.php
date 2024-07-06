<?php

const TIPO_CONTA_PAGAR = 'P';
const TIPO_CONTA_RECEBER = 'R';

class Conta {

    public $id = '';
    public $descricao = '';
    public $tipo = TIPO_CONTA_RECEBER;
    public $valor = 0.00;
    public $vencimento = null;
    public $paga = false;

    public function __construct(
        $id = '',
        $descricao = '',
        $tipo = TIPO_CONTA_RECEBER,
        $valor = 0.00,
        $vencimento = null,
        $paga = false
    ) {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->tipo = $tipo;
        $this->valor = $valor;
        $this->vencimento = $vencimento;
        $this->paga = $paga;
    }

    public function saldo() {
        return ( $this->tipo === TIPO_CONTA_PAGAR )
            ? ( $this->valor * -1 )
            : $this->valor;
    }
}