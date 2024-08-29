<?php
namespace Acme\Controllers;

use Acme\Models\Fornecedor;
use Acme\Models\RepositorioFornecedor;
use Acme\Models\RepositorioException;
use Acme\Views\JsonView;
use Acme\Utils\Validator;

class FornecedorController {
    private $repositorio;

    public function __construct(RepositorioFornecedor $repositorio) {
        $this->repositorio = $repositorio;
    }

    public function index($filtro = '') {
        try {
            $fornecedores = $this->repositorio->todos($filtro);
            JsonView::render($fornecedores);
        } catch (RepositorioException $e) {
            JsonView::render(['erro' => $e->getMessage()], 500);
        }
    }

    public function criar() {
        try {
            $dados = $_POST;
            $fornecedor = new Fornecedor($dados);
            $erros = Validator::validarFornecedor($fornecedor);
            
            if (!empty($erros)) {
                JsonView::render(['erros' => $erros], 400);
                return;
            }

            $this->repositorio->cadastrar($fornecedor);
            JsonView::render($fornecedor, 201);
        } catch (RepositorioException $e) {
            JsonView::render(['erro' => $e->getMessage()], 500);
        }
    }

    public function atualizar($id) {
        try {
            $dados = json_decode(file_get_contents('php://input'), true);
            $fornecedor = new Fornecedor($dados);
            $fornecedor->id = $id;

            $erros = Validator::validarFornecedor($fornecedor);
            
            if (!empty($erros)) {
                JsonView::render(['erros' => $erros], 400);
                return;
            }

            $this->repositorio->atualizar($fornecedor);
            JsonView::render($fornecedor);
        } catch (RepositorioException $e) {
            JsonView::render(['erro' => $e->getMessage()], 500);
        }
    }

    public function remover($idOuCodigo) {
        try {
            $this->repositorio->remover($idOuCodigo);
            JsonView::render(null, 204);
        } catch (RepositorioException $e) {
            JsonView::render(['erro' => $e->getMessage()], 404);
        }
    }
}