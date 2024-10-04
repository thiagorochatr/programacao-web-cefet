<?php
class Categoria {
    public int $id;
    public string $descricao;

    public function __construct(
        int $id = 0,
        string $descricao = ''
    ) {
        $this->id = $id;
        $this->descricao = $descricao;
    }
}