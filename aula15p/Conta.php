<?php
class Conta {
    public function __construct(
        public int $id = 0,
        public string $descricao = '',
        public float $valor = 0.0
    ) {
    }
}
?>