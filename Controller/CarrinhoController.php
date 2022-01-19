<?php

/**/
session_start();
include_once("../configuracao/ControleConexao.php");
include_once("../DAO/FilmeDAO.php");
include_once("../DAO/PedidoDAO.php");
include_once("../MODEL/Filme.php");
include_once("../MODEL/Usuario.php");
include_once("../MODEL/Pedido.php");
include_once("../MODEL/PedidoFilme.php");
include_once("../configuracao/conexao.php");
include_once("../configuracao/Constantes.php");

//pega o fuso horário local de campo grande
date_default_timezone_set('America/Campo_Grande');

$REQUEST = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

// Armazenar essa instância no Controlador
$controleConexao = ControleConexao::getInstance();
$controleConexao->set('Connection', $conn);

//Instanciar a classe DAO para utilizarmos os seus métodos posteriormente
//$pratoDAO = new PratoDAO();
$pedidoDAO = new PedidoDAO();

$acao = filter_input(INPUT_GET, 'acao', FILTER_SANITIZE_STRING);

switch ($acao) {
    case $acao == "verCarrinho":
        if (!isset($_SESSION["carrinho"]) || empty($_SESSION["carrinho"])) {
            $_SESSION["carrinho"] = array();
        }

        //para evitar registros duplicados
        $_SESSION["carrinho"] = array_unique($_SESSION["carrinho"]);


        header('location: ../VIEW/paginas/carrinho/gerenciar_carrinho.php');
         exit();
        break;

    case $acao == "remover":

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//aqui removemos o pedido pelo id
        unset($_SESSION["carrinho"][$id]);

        header('location: ../VIEW/paginas/carrinho/gerenciar_carrinho.php');
         exit();
        break;


    case $acao == "finalizarCompra":

        unset($_SESSION['mensagemSistema']);

        if (!isset($_SESSION["carrinho"]) || empty($_SESSION["carrinho"])) {
            $_SESSION["carrinho"] = array();
            $_SESSION['mensagemSistema'] = "Carrinho vazio!";
        } else {
            
            $quantidadeFilme = filter_input(INPUT_POST, 'quantidadeFilme', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $dataAtual = date('Y-m-d H:i:s');
            $pedido = new Pedido();

            $pedido->setData($dataAtual);

            //realizamos a verificação do usuário na sessão e pegamos o seu ID
            if (isset($_SESSION['usuario_logado'])) {
                $usuarioLogado = unserialize($_SESSION['usuario_logado']);
                $pedido->setFk_id_usuario($usuarioLogado->getId_usuario());
            }
            $pedido->setStatus("EM ANDAMENTO");

            $inserido = $pedidoDAO->inserir($pedido);
            $pedido->setId_pedido($inserido);

            $valorPedido = 0;
            $i = 0;
            foreach ($_SESSION["carrinho"] as $filme) {
                $filme = unserialize($filme);
                $pedidoFilme = new PedidoFilme();

                $pedidoFilme->setFk_id_pedido($pedido->getId_pedido());
                $pedidoFilme->setFk_id_filme($filme->getId_filme());
                $pedidoFilme->setQuantidade($quantidadeFilme[$i]);
                $valorFilme = $filme->getPreco() * $quantidadeFilme[$i] + $valorPedido;
                $i++;

                $pedidoDAO->adicionarFilmes($pedidoFilme);
            }
            $pedido->setValorTotal($valorPedido);
            $pedidoDAO->atualizar($pedido);
            
             $_SESSION['mensagemSistema'] = "Pedido realizado com sucesso! <br> Total a ser pago: " . $valorPedido;
        }




       

        header('location: ../VIEW/paginas/carrinho/gerenciar_carrinho.php');
         exit();
        break;


    default:

        break;
}