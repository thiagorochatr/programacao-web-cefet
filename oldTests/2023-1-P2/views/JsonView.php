<?php
namespace Acme\Views;

class JsonView {
    public static function render($data, $statusCode = 200) {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data);
    }
}