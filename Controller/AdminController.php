<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("../configuracao/ControleConexao.php");
include_once("../DAO/FilmeDAO.php");
include_once("../DAO/PedidoDAO.php");
include_once("../MODEL/Filme.php");
include_once("../MODEL/Usuario.php");
include_once("../configuracao/conexao.php");
include_once("../configuracao/Constantes.php");


$REQUEST = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

// Armazenar essa instância no Controlador
$controleConexao = ControleConexao::getInstance();
$controleConexao->set('Connection', $conn);

//Instanciar a classe DAO para utilizarmos os seus métodos posteriormente
$filmeDAO = new filmeDAO();
$pedidoDAO = new PedidoDAO();

$acao = filter_input(INPUT_GET, 'acao', FILTER_SANITIZE_STRING);


switch ($acao) {

    case $acao == "listarPedidosUsuarios":


        $listaPedidos = $pedidoDAO->buscarPedidosStatus("EM ANDAMENTO");

        $_SESSION['listaPedidos'] = serialize($listaPedidos);
        header('location: ../VIEW/paginas/pedidos/gerenciar_pedidos.php');
        exit();
        break;


    case $acao == "listarFinalizados":

        $listaPedidos = $pedidoDAO->buscarPedidosStatus("FINALIZADO");

        $_SESSION['listaPedidos'] = serialize($listaPedidos);
        header('location: ../VIEW/paginas/pedidos/gerenciar_pedidos.php');
        exit();
        break;

    case $acao == "listarCancelados":

        $listaPedidos = $pedidoDAO->buscarPedidosStatus("CANCELADO");

        $_SESSION['listaPedidos'] = serialize($listaPedidos);
        header('location: ../VIEW/paginas/pedidos/gerenciar_pedidos.php');
        exit();
        break;





    case $acao == "cancelarPedido":
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $pedidoDAO->cancelarPedido($id);

        $listaPedidos = $pedidoDAO->buscarPedidosStatus("EM ANDAMENTO");

        $_SESSION['listaPedidos'] = serialize($listaPedidos);
        header('location: /IFMS/web2/loja_locadora/VIEW/paginas/pedidos/gerenciar_pedidos.php');
        exit();

        break;

    case $acao == "finalizarPedido":
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $pedidoDAO->finalizarPedido($id);

        $listaPedidos = $pedidoDAO->buscarPedidosStatus("EM ANDAMENTO");

        $_SESSION['listaPedidos'] = serialize($listaPedidos);
        header('location: /IFMS/web2/loja_locadora/VIEW/paginas/pedidos/gerenciar_pedidos.php');
        exit();
        
        break;

    default:

        break;
}


