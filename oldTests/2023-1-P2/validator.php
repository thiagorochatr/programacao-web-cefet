<?php
namespace Acme\Utils;

use Acme\Models\Fornecedor;

class Validator {
    public static function validarFornecedor(Fornecedor $fornecedor) {
        $erros = [];

        if ($fornecedor->id < 0) {
            $erros[] = "ID deve ser um número inteiro não negativo";
        }

        if (!preg_match('/^[A-Z]{2}-\d{2}\.[a-z]{2}$/', $fornecedor->codigo)) {
            $erros[] = "Código inválido. Deve seguir o padrão: duas letras maiúsculas, traço, dois números, ponto, duas letras minúsculas";
        }

        if (strlen($fornecedor->nome) > 100 || empty($fornecedor->nome)) {
            $erros[] = "Nome inválido. Deve ter entre 1 e 100 caracteres";
        }

        if (!preg_match('/^\d{14}$/', $fornecedor->cnpj)) {
            $erros[] = "CNPJ inválido. Deve conter exatamente 14 dígitos numéricos";
        }

        if (strlen($fornecedor->email) > 60 || !filter_var($fornecedor->email, FILTER_VALIDATE_EMAIL)) {
            $erros[] = "Email inválido";
        }

        if (!preg_match('/^\d{11}$/', $fornecedor->telefone)) {
            $erros[] = "Telefone inválido. Deve conter exatamente 11 dígitos numéricos";
        }

        return $erros;
    }
}