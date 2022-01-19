<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("configuracao/ControleConexao.php");
include_once("DAO/FilmeDAO.php");
include_once("MODEL/Filme.php");
include_once("configuracao/conexao.php");
include_once("configuracao/Constantes.php");

$REQUEST = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

// Armazenar essa instância no Controlador
$controleConexao = ControleConexao::getInstance();
$controleConexao->set('Connection', $conn);


$acao = filter_input(INPUT_GET, 'acao', FILTER_SANITIZE_STRING);

$filmeDAO = new FilmeDAO();
switch ($acao) {
    case $acao == "mostrarMenu":

        $resultados = $filmeDAO->buscarTodos();
        unset($_SESSION['listaFilmes']);
        $_SESSION['listaFilmes'] = serialize($resultados);

        header('location: /IFMS/web2/loja_locadora/novoIndex.php');
        exit();
        break;

    default:
        break;
}



function menu() {
    global $filmeDAO;
    
    $resultados = $filmeDAO->buscarTodos();
    unset($_SESSION['listaFilmes']);
    $_SESSION['listaFilmes'] = serialize($resultados);

    header('location: /IFMS/web2/loja_locadora/novoIndex.php');
    exit();
}
