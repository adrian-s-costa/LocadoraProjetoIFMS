<!DOCTYPE html>
    <html>
	
        <?php
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        include_once("configuracao/ControleConexao.php");
        include_once("DAO/FilmeDAO.php");
        include_once("MODEL/Filme.php");
        include_once("configuracao/conexao.php");
        include_once("configuracao/Constantes.php");
        require_once __RAIZ__ . '/MODEL/Usuario.php';
        

        
        
        
        ?>
        
        <head>
            <link rel="stylesheet" type="text/css" href="VIEW\paginas\css\cssnovo.css">
            <title>Locadora Drive - Inicio</title>
	</head>
        
        
        <script>
            // ações do menu
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
        
        <?php
        
        if (isset($_SESSION['mensagemSistema'])):
            $mensagem = isset($_SESSION['mensagemSistema']) ? $_SESSION['mensagemSistema'] : "";
            ?>

            <div class = "alert alert-info">
                <strong><?php echo $mensagem; ?></strong> 
            </div>

            <?php
            unset($_SESSION['mensagemSistema']);
        endif;
        ?>
        
	<header id="top1">
            <img id="drivelogo"  src="VIEW\imagens\logomarca da deeeeps.png" >
            <img id="drivelogo2" src="VIEW\imagens\logomarca da deeeeps.png" >
	
            <h1> Locadora Drive </h1>	
            <h2> Dirija ate os melhores filmes</h2>
	
            
            <?php        
        if (!isset($_SESSION['usuario_logado'])): ?>
            
            <ul id="barra">
		
                <li> <a href="novoIndex.php"> Inicio </a></li>  
                <li> <a href="VIEW/paginas/contato/contato.php"> Contato </a> </li>
		<li> <a href="VIEW/paginas/sobre/sobrenoss.php"> Sobre nos </a> </li>
                <li> <a href="/IFMS/web2/loja_locadora/Controller/UsuarioController.php?acao=login"> Login </a> </li>
	
            </ul>
            
            <?php 
            
        elseif (unserialize($_SESSION['usuario_logado'])->getTipo() == "ADMINISTRADOR"): ?>
            <ul id="barra">
                <li> <a href="novoIndex.php"> Inicio </a></li>  
                <li> <a href="VIEW/paginas/contato/contato.php"> Contato </a> </li>
		<li> <a href="VIEW/paginas/sobre/sobrenoss.php"> Sobre nos </a> </li>
                <li> <a href="/IFMS/web2/loja_locadora/Controller/FilmeController.php?acao=listarFilmes"> Gerenciar filmes </a> </li>
                <li> <a href="/IFMS/web2/loja_locadora/Controller/AdminController.php?acao=listarPedidosUsuarios"> Gerenciar pedidos </a> </li>
                <li> <a href="/IFMS/web2/loja_locadora/Controller/UsuarioController.php?acao=logout"> Logout </a> </li>
	
            </ul>
        
        <?php elseif (unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL"): ?>
             <ul id="barra">   
                <li> <a href="novoIndex.php"> Inicio </a></li>  
                <li> <a href="VIEW/paginas/contato/contato.php"> Contato </a> </li>
		<li> <a href="VIEW/paginas/sobre/sobrenoss.php"> Sobre nos </a> </li>
                <li> <a href="/IFMS/web2/loja_locadora/Controller/CarrinhoController.php?acao=verCarrinho"> Carrinho </a> </li>
                <li> <a href="/IFMS/web2/loja_locadora/Controller/UsuarioController.php?acao=logout"> Logout </a> </li>
             </ul>
        <?php endif; ?>
        </header>   
        
        
        
        <body>
            <div id="interface">
                <nav id="bodyheader">
                    <article class="item">
			So aqui voce encontra o melhor conteudo sobre filmes pelo melhor preco
                    </article>
		</nav>

		<nav id="bodyheader2">
                    <a href="form.html" class="item">Tornar-se um Driver</a>
		</nav>
<div id="cf">
                    <img src="VIEW\imagens\870886.jpg" />
                    <img src="VIEW\imagens\moto.jpg" />
                    <img src="VIEW\imagens\no.jpg" />
                </div>

	


               	
		
                <div id="cf">
                    <img src="VIEW\imagens\870886.jpg" />
                    <img src="VIEW\imagens\moto.jpg" />
                    <img src="VIEW\imagens\no.jpg" />
                </div>

	


                
                
                
                <div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="menu" style=" position: relative; text-align: center">
     <div class="w3-content">
       <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">MENU</h1>

        <?php
      
        if (isset($_SESSION['mensagemSistema'])):
            $mensagem = isset($_SESSION['mensagemSistema']) ? $_SESSION['mensagemSistema'] : "";
            ?>

            <div class = "alert alert-info">
                <strong><?php echo $mensagem; ?></strong> 
            </div>

            <?php
            unset($_SESSION['mensagemSistema']);
        endif;
        ?>

       <div class="w3-row w3-center w3-border w3-border-dark-grey" style=" display: inline-flex; justify-content: space-between " >
            <a href="javascript:void(0)" onclick="openMenu(event, 'Horror');" id="myLink">
                <div class="w3-col s4 tablink w3-padding-large w3-hover-red" style="text-align: center">Terror</div>
            </a> <a href="javascript:void(0)" onclick="openMenu(event, 'Action');">
                <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Acao</div>
            </a> <a href="javascript:void(0)" onclick="openMenu(event, 'Crime');">
                <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Crime</div>                
            </a> <a href="javascript:void(0)" onclick="openMenu(event, 'Animacao');">
                <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Animacao</div>                
            </a> 

        </div>



       <div id="Horror" class="w3-container menu w3-padding-32 w3-white">

            <?php
            $registrosObtidos = unserialize($_SESSION['listaFilmes']);

            foreach ($registrosObtidos as $filmeOBJ) {

                if ($filmeOBJ->getGenero() == 'horror') {
                    ?>

                    <h1><b><?php echo $filmeOBJ->getNome(); ?></b> &nbsp; - &nbsp; <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo 'R$ ' . $filmeOBJ->getPreco(); ?></span></h1>
                    <p class="w3-text-grey"> <h4 style="color: #fbed90"> <?php echo $filmeOBJ->getDescricao(); ?> &nbsp; - &nbsp; Duracao: &nbsp; <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo $filmeOBJ->getDuracao_min() == "Não se aplica" ? "" : $filmeOBJ->getDuracao_min(); ?></span> 
                       <?php if (isset($_SESSION['usuario_logado']) && unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL") : ?> </h4>
                            <a href="/IFMS/web2/loja_locadora/Controller/FilmeController.php?acao=adicionarCarrinho&id=<?php echo $filmeOBJ->getId_filme(); ?>" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Alugar</a>      
        <?php endif; ?>
                    </p>                
                    <hr>

                    <?php
                }
            }
            ?>          
        </div>
        <div id="Action" class="w3-container menu w3-padding-32 w3-white">


            <?php
            foreach ($registrosObtidos as $filmeOBJ) {

                if ($filmeOBJ->getGenero() == 'action') {
                    ?>
                    <h1><b><?php echo $filmeOBJ->getNome(); ?></b> &nbsp; - &nbsp; <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo 'R$ ' . $filmeOBJ->getPreco(); ?></span></h1>
                    <p class="w3-text-grey"> <h4 style="color: #fbed90"> <?php echo $filmeOBJ->getDescricao(); ?> &nbsp; - &nbsp; Duracao: &nbsp; <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo $filmeOBJ->getDuracao_min() == "Não se aplica" ? "" : $filmeOBJ->getDuracao_min(); ?></span> 
                        <?php if (isset($_SESSION['usuario_logado']) && unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL") : ?> </h4>
                            <a href="/IFMS/web2/loja_locadora/Controller/FilmeController.php?acao=adicionarCarrinho&id=<?php echo $filmeOBJ->getId_filme(); ?>" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Alugar</a>                  
        <?php endif; ?>    
                    </p>   
                    <hr>

                    <?php
                }
            }
            ?>  
        </div>

       <div id="Crime" class="w3-container menu w3-padding-32 w3-white">

            <?php
            foreach ($registrosObtidos as $filmeOBJ) {

                if ($filmeOBJ->getGenero() == 'crime') {
                    ?>
                    <h1><b><?php echo $filmeOBJ->getNome(); ?></b> &nbsp; - &nbsp; <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo 'R$ ' . $filmeOBJ->getPreco(); ?></span></h1>
                    <p class="w3-text-grey"> <h4 style="color: #fbed90"> <?php echo $filmeOBJ->getDescricao(); ?> &nbsp; - &nbsp; Duracao: &nbsp; <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo $filmeOBJ->getDuracao_min() == "Não se aplica" ? "" : $filmeOBJ->getDuracao_min(); ?></span> 
                        <?php if (isset($_SESSION['usuario_logado']) && unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL") : ?> </h4>
                            <a href="/IFMS/web2/loja_locadora/Controller/FilmeController.php?acao=adicionarCarrinho&id=<?php echo $filmeOBJ->getId_filme(); ?>" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Alugar</a>                  
        <?php endif; ?>
                    </p>   
                    <hr>
                    <?php
                }
            }
            ?>  
        </div>

        <div id="Animacao" class="w3-container menu w3-padding-32 w3-white">

            <?php
            foreach ($registrosObtidos as $filmeOBJ) {

                if ($filmeOBJ->getGenero() == 'animation') {
                    ?>
                    <h1><b><?php echo $filmeOBJ->getNome(); ?></b> &nbsp; - &nbsp; <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo 'R$ ' . $filmeOBJ->getPreco(); ?></span></h1>
                    <p class="w3-text-grey"> <h4 style="color: #fbed90"> <?php echo $filmeOBJ->getDescricao(); ?> &nbsp; - &nbsp; Duracao: &nbsp; <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo $filmeOBJ->getDuracao_min() == "Não se aplica" ? "" : $filmeOBJ->getDuracao_min(); ?></span> 
                        <?php if (isset($_SESSION['usuario_logado']) && unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL") : ?> </h4>
                            <a href="/IFMS/web2/loja_locadora/Controller/FilmeController.php?acao=adicionarCarrinho&id=<?php echo $filmeOBJ->getId_filme(); ?>" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Alugar</a>                  
                <?php endif; ?>
                    </p>   
                    <hr>
                    <?php
                }
            }
            ?>  
        </div>
        <br>
    </div>
</div>
	
		
                
			
			

                