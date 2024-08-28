<?php
require_once 'VisaoConta.php';
require_once 'GestorConta.php';
require_once 'RepositorioContaEmBDR.php';

class ControladoraConta {

    private $visao;
    private $gestor;

    public function __construct() {
        $this->visao = new VisaoConta();

        // O ideal é criar fora da controladora, quando houver
        // outras funcionalidades na aplicação
        $pdo = new PDO(
            'mysql:dbname=aula15;host=localhost;charset=utf8',
            'root',
            '',
            [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]
        );
        $repositorio = new RepositorioContaEmBDR( $pdo );
        $this->gestor = new GestorConta( $repositorio );
    }

    function cadastrarConta() {
        $dados = $this->visao->dadosConta();
        try {
            $this->gestor->adicionarConta( $dados );
            $this->visao->mostrarSalvoComSucesso();
        } catch ( Exception $e ) {
            $this->visao->mostrarExcecao( $e );
        }
    }

}