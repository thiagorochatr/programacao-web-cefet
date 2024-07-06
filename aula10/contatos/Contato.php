<?php
// require_once __DIR__ . '/../cidades/Cidade.php';

class Contato {
    public $id = 0;
    public $nome = '';
    public $telefone = '';
    public $cidade = null; // Apenas null ou um objeto de Cidade

    public function __construct(
        $id = 0,
        $nome = '',
        $telefone = '',
        $cidade = null
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->cidade = $cidade;
    }
}