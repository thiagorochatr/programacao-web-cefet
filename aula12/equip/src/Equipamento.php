<?php
require_once 'Categoria.php';

class Equipamento {
    public int $id;
    public string $codigo;
    public string $descricao;
    public string $situacao;
    public DateTime $cadastro;
    public Categoria $categoria;

    public function __construct(
        int $id,
        string $codigo,
        string $descricao,
        string $situacao,
        DateTime $cadastro,
        Categoria $categoria
    ) {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->situacao = $situacao;
        $this->cadastro = $cadastro;
        $this->categoria = $categoria;
    }
}

?>