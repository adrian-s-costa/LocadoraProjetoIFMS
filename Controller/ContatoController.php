<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("../configuracao/ControleConexao.php");
include_once("../configuracao/conexao.php");
include_once("../configuracao/Constantes.php");

$REQUEST = filter_input(INPUT_SERVER, 'REQUEST_METHOD');


$controleConexao = ControleConexao::getInstance();
$controleConexao->set('Connection', $conn);


$acao = filter_input(INPUT_GET, 'acao', FILTER_SANITIZE_STRING);


switch ($acao) {
    case $acao == "enviarEmail":
        if ($REQUEST == "POST") {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
            $emailUsuario = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_DEFAULT);

            enviarEmail($emailUsuario, $mensagem, $nome);
        }

        break;

    default:
        break;
}



function enviarEmail($emailUsuario, $mensagem, $nome) {

    
    $destino = "AdrianCosta1215@gmail.com";
    $assunto = "Contato Locadora";


    $cabecalhos = array(
        'From' => $emailUsuario,
        'Reply-To' => 'AdrianCosta1215@gmail.com',
        'Cc' => 'AdrianCosta1215@gmail.com',
        'X-Mailer' => 'PHP/' . phpversion()
    );

    $mensagem = $nome . "\r\n" . $mensagem;

    $mensagem = wordwrap($mensagem, 70, "\r\n");

    $resposta = mail($destino, $assunto, $mensagem, $cabecalhos);

    if ($resposta == true) {
        echo 'email enviado com sucesso!';
    } else {
        echo 'email não foi enviado!';
    }
}
