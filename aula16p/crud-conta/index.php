<?php
require_once 'src/MenuConta.php';
require_once 'src/ControladoraConta.php';

$menu = new MenuConta();
if ( $menu->desejaCadastrarConta() ) {
    $controladora = new ControladoraConta();
    $controladora->cadastrarConta();
} else {
    $menu->mostrarOpcaoInvalida();
}