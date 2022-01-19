<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head>
        <?php
        include_once '../../../configuracao/Constantes.php';
        require_once __RAIZ__ . '/MODEL/Usuario.php';
        require_once __RAIZ__ . '/MODEL/Pedido.php';
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        ?>

        <script>
            // Tabbed Menu
            function openMenu(evt, menuName) {
                var i, x, tablinks;
                x = document.getElementsByClassName("menu");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < x.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
                }
                document.getElementById(menuName).style.display = "block";
                evt.currentTarget.firstElementChild.className += " w3-red";
            }
            document.getElementById("myLink").click();
        </script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Restaurante IFMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">

        <style>

            header {font-family: "Amatic SC", sans-serif}

            body, html {height: 100%}           

            .menu {display: none}
            .bgimg {
                background-repeat: no-repeat;
                background-size: cover;
                background-image: url("VIEW/imagens/restaurante_fundo_hd.jpg");
                min-height: 90%;
            }
        </style>


    </head>
    <header>
        <!-- Navbar (sit on top) 
        <div class="w3-top w3-hide-small">
            <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
                <a href="../../../index.php#home" class="w3-bar-item w3-button">HOME</a> 
                <a href="../../../index.php#menu" class="w3-bar-item w3-button">MENU</a>
                <a href="../../../index.php#sobre" class="w3-bar-item w3-button">Sobre</a> 
                <a href="../../../index.php#contato" class="w3-bar-item w3-button">Contato</a> 
                <a href="login.php" class="w3-bar-item w3-button">Login</a> 
            </div>
        </div>
        -->

        <?php if (!isset($_SESSION['usuario_logado'])): ?>
            <!-- Navbar (sit on top) -->
            <div class="w3-top w3-hide-small">
                <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
                    <!--<a href="#" class="w3-bar-item w3-button">HOME</a> <a href="#menu" class="w3-bar-item w3-button">MENU</a>-->
                    <a href="/IFMS/web2/loja_pizzaria/index.php#home" class="w3-bar-item w3-button">HOME</a>
                    <a href="/IFMS/web2/loja_pizzaria/Controller/PratoController.php?acao=mostrarMenu" class="w3-bar-item w3-button">MENU</a>
                    <a href="/IFMS/web2/loja_pizzaria/index.php#sobre" class="w3-bar-item w3-button">Sobre</a> 
                    <a href="/IFMS/web2/loja_pizzaria/index.php#contato" class="w3-bar-item w3-button">Contato</a> 
                    <a href="/IFMS/web2/loja_pizzaria/Controller/UsuarioController.php?acao=login" class="w3-bar-item w3-button">Login</a> 
                </div>
            </div>

        <?php elseif (unserialize($_SESSION['usuario_logado'])->getTipo() == "ADMINISTRADOR"): ?>

            <div class="w3-top w3-hide-small">
                <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
                    <!--<a href="#" class="w3-bar-item w3-button">HOME</a> <a href="#menu" class="w3-bar-item w3-button">MENU</a>-->
                    <a href="/IFMS/web2/loja_pizzaria/index.php#home" class="w3-bar-item w3-button">HOME</a>
                    <a href="/IFMS/web2/loja_pizzaria/index.php#menu" class="w3-bar-item w3-button">MENU</a>
                    <a href="/IFMS/web2/loja_pizzaria/index.php#sobre" class="w3-bar-item w3-button">Sobre</a> 
                    <a href="/IFMS/web2/loja_pizzaria/index.php#contato" class="w3-bar-item w3-button">Contato</a> 
                    <a href="/IFMS/web2/loja_pizzaria/Controller/PratoController.php?acao=listarPratos" class="w3-bar-item w3-button">Gerenciar Pratos</a>
                    <a href="/IFMS/web2/loja_pizzaria/Controller/AdminController.php?acao=listarPedidosUsuarios" class="w3-bar-item w3-button">Gerenciar Pedidos</a> 
                    <a href="/IFMS/web2/loja_pizzaria/Controller/UsuarioController.php?acao=logout" class="w3-bar-item w3-button">Logout</a> 
                </div>
            </div>  
        <?php elseif (unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL"): ?>


            <div class="w3-top w3-hide-small">
                <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
                    <!--<a href="#" class="w3-bar-item w3-button">HOME</a> <a href="#menu" class="w3-bar-item w3-button">MENU</a>-->
                    <a href="/IFMS/web2/loja_pizzaria/index.php#home" class="w3-bar-item w3-button">HOME</a>
                    <a href="/IFMS/web2/loja_pizzaria/index.php#menu" class="w3-bar-item w3-button">MENU</a>
                    <a href="/IFMS/web2/loja_pizzaria/index.php#sobre" class="w3-bar-item w3-button">Sobre</a> 
                    <a href="/IFMS/web2/loja_pizzaria/index.php#contato" class="w3-bar-item w3-button">Contato</a> 
                    <a href="/IFMS/web2/loja_pizzaria/Controller/CarrinhoController.php?acao=verCarrinho" class="w3-bar-item w3-button">Carrinho</a>
                    <a href="/IFMS/web2/loja_pizzaria/Controller/UsuarioController.php?acao=logout" class="w3-bar-item w3-button">Logout</a> 
                </div>
            </div>  
        <?php endif; ?>        




    </header>

    <body>
    </body>

</html>
