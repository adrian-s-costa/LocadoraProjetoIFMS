<!DOCTYPE html>
    <html>
	
        <?php
        include_once '../../../configuracao/Constantes.php';
        require_once __RAIZ__ . '/MODEL/Usuario.php';
        require_once __RAIZ__ . '/MODEL/Pedido.php';
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        ?>
        
        <head>
            <link rel="stylesheet" type="text/css" href="..\css\email.css">
            <style>
                
            a{font-family: 'Press Start 2P'; color:#e30d4b; text-align: center;}
            a:hover {color:#fbed90;}
        
            </style>
            <title>Locadora Drive - Inicio</title>
	</head>
        
        
       
        
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
        
	
	
            
            <?php    
            
            
            
        if (!isset($_SESSION['usuario_logado'])): ?>
            
            <ul id="barra">
		
                <li> <a href="/IFMS/web2/loja_locadora/novoIndex.php" > Inicio </a></li>  
                <li> <a href="/IFMS/web2/loja_locadora/VIEW/paginas/contato/contato.php"> Contato </a> </li>
		<li> <a href="/IFMS/web2/loja_locadora/VIEW/paginas/sobre/sobrenoss.php"> Sobre nos </a> </li>
                <li> <a href="/IFMS/web2/loja_locadora/Controller/UsuarioController.php?acao=login"> Login </a> </li>
	
            </ul>
            
            <?php 
            
        elseif (unserialize($_SESSION['usuario_logado'])->getTipo() == "ADMINISTRADOR"): ?>
            <ul id="barra">
                <li> <a href="/IFMS/web2/loja_locadora/novoIndex.php"> Inicio </a></li>  
                <li> <a href="/IFMS/web2/loja_locadora/VIEW/paginas/contato/contato.php"> Contato </a> </li>
		<li> <a href="/IFMS/web2/loja_locadora/VIEW/paginas/sobre/sobrenoss.php"> Sobre nos </a> </li>
                <li> <a href="/IFMS/web2/loja_locadora/Controller/FilmeController.php?acao=listarFilmes"> Gerenciar filmes </a> </li>
                <li> <a href="/IFMS/web2/loja_locadora/Controller/AdminController.php?acao=listarPedidosUsuarios"> Gerenciar pedidos </a> </li>
                <li> <a href="/IFMS/web2/loja_locadora/Controller/UsuarioController.php?acao=logout"> Logout </a> </li>
	
            </ul>
        
        <?php elseif (unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL"): ?>
             <ul id="barra">   
                <li> <a href="/IFMS/web2/loja_locadora/novoIndex.php"> Inicio </a></li>  
                <li> <a href="/IFMS/web2/loja_locadora/VIEW/paginas/contato/contato.php"> Contato </a> </li>
		<li> <a href="/IFMS/web2/loja_locadora/VIEW/paginas/sobre/sobrenoss.php"> Sobre nos </a> </li>
                <li> <a href="/IFMS/web2/loja_locadora/Controller/CarrinhoController.php?acao=verCarrinho"> Carrinho </a> </li>
                <li> <a href="/IFMS/web2/loja_locadora/Controller/UsuarioController.php?acao=logout"> Logout </a> </li>
             </ul>
        <?php endif; ?>
        </header>   