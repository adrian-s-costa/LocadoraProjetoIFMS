<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("../configuracao/ControleConexao.php");
include_once("../DAO/FilmeDAO.php");
include_once("../MODEL/Filme.php");
include_once("../configuracao/conexao.php");
include_once("../configuracao/Constantes.php");

$REQUEST = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

// Armazenar essa instância no Controlador
$controleConexao = ControleConexao::getInstance();
$controleConexao->set('Connection', $conn);

//Instanciar a classe DAO para utilizarmos os seus métodos posteriormente
$filmeDAO = new filmeDAO();

$acao = filter_input(INPUT_GET, 'acao', FILTER_SANITIZE_STRING);


switch ($acao) {

    case $acao == "adicionarCarrinho":
        $idFilme = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $resultado = $filmeDAO->buscarRegistro($idFilme);

        $filmeOBJ = (object) $resultado[0];
        if (!isset($_SESSION["carrinho"]) || empty($_SESSION["carrinho"])) {
            $_SESSION["carrinho"] = array();
        }


        $_SESSION["carrinho"][$filmeOBJ->getId_filme()] = serialize($filmeOBJ);

        unset($_SESSION['mensagemSistema']);
        $_SESSION['mensagemSistema'] = "" . $filmeOBJ->getNome() . " foi adicionado ao carrinho";


        header('location: ../novoIndex.php#menu');
        exit();
        break;



    case $acao == "listarFilmes":
        atualizarListaAdmin();
        break;



    case $acao == "remover":
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $filmeDAO->remover($id);

        unset($_SESSION['mensagemSistema']);
        $_SESSION['mensagemSistema'] = 'Filme removido com sucesso!';

        atualizarListaAdmin();
        break;

    case $acao == "editar":
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        unset($_SESSION['editar_filme']);

        $resultado = $filmeDAO->buscarRegistro($id);
        $_SESSION['editar_filme'] = serialize($resultado[0]);


        header('location: ../VIEW/paginas/filme/cadastro_filme.php');
        exit();
        break;

    case $acao == "adicionar":
        $_SESSION['editar_filme'] = serialize(new Filme());
        header('location: ../VIEW/paginas/filme/cadastro_filme.php');
        exit();
        break;

    case $acao == "cadastrarFilme":


        if ($REQUEST == "POST") {
            $id_filme = filter_input(INPUT_POST, 'id_filme', FILTER_DEFAULT);
            $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
            $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
            $duracao_min = filter_input(INPUT_POST, 'duracao_min', FILTER_SANITIZE_STRING);


            
            $filmeNovo = new Filme();

            $filmeNovo->setId_filme($id_filme);
            $filmeNovo->setDescricao($descricao);
            $filmeNovo->setNome($nome);
            $filmeNovo->setPreco($preco);
            $filmeNovo->setDuracao_min($duracao_min);
            $filmeNovo->setGenero($genero);


            // Chamar o método inserir criado no DAO.
            if ($filmeNovo->getId_filme() == null) {
                $filmeDAO->inserir($filmeNovo);
                unset($_SESSION['mensagemSistema']);
                $_SESSION['mensagemSistema'] = 'Filme Adicionado com sucesso!';
            } else {
                $filmeDAO->atualizar($filmeNovo);
                unset($_SESSION['mensagemSistema']);
                $_SESSION['mensagemSistema'] = 'Filme Editado com sucesso!';
            }

            atualizarListaAdmin();
        }
        break;




    default:

        break;
}

function atualizarListaAdmin() {
    buscarTodos();
    header('location: ../VIEW/paginas/filme/gerenciar_filme.php');
    exit();
}

//busca todos os pratos e insere na session

function buscarTodos() {
    // Chamar o método buscarTodos() criado no DAO.
    global $filmeDAO;
    $resultados = $filmeDAO->buscarTodos();
    unset($_SESSION['listaFilmes']);
    $_SESSION['listaFilmes'] = serialize($resultados);
}
