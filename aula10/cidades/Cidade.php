<?php
class Cidade {
    public $id = 0;
    public $nome = '';

    public function __construct(
        $id = 0,
        $nome = ''
    ) {
        $this->id = $id;
        $this->nome = $nome;
    }
}
?>