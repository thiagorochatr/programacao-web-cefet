<?php
require_once 'vendor/autoload.php';

use Acme\Controllers\FornecedorController;
use Acme\Models\RepositorioFornecedorEmBDR;

$repositorio = new RepositorioFornecedorEmBDR(conexao());
$controller = new FornecedorController($repositorio);

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($path, '/'));

if ($segments[0] !== 'fornecedores') {
    http_response_code(404);
    exit;
}

switch ($method) {
    case 'GET':
        $filtro = $_GET['filtro'] ?? '';
        $controller->index($filtro);
        break;
    case 'POST':
        $controller->criar();
        break;
    case 'PUT':
        if (isset($segments[1])) {
            $controller->atualizar($segments[1]);
        } else {
            http_response_code(400);
        }
        break;
    case 'DELETE':
        if (isset($segments[1])) {
            $controller->remover($segments[1]);
        } else {
            http_response_code(400);
        }
        break;
    default:
        http_response_code(405);
        break;
}