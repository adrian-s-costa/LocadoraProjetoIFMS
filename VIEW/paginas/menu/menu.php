

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __RAIZ__ . '/Model/Prato.php';

?>





<!-- Container de Menu  -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="menu">
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

        <div class="w3-row w3-center w3-border w3-border-dark-grey">
            <a href="javascript:void(0)" onclick="openMenu(event, 'Pizza');" id="myLink">
                <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Pizza</div>
            </a> <a href="javascript:void(0)" onclick="openMenu(event, 'Prato');">
                <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Prato</div>
            </a> <a href="javascript:void(0)" onclick="openMenu(event, 'Sobremesa');">
                <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Sobremesa</div>                
            </a> <a href="javascript:void(0)" onclick="openMenu(event, 'Bebida');">
                <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Bebidas</div>                
            </a> 

        </div>



        <div id="Pizza" class="w3-container menu w3-padding-32 w3-white">

            <?php
            $registrosObtidos = unserialize($_SESSION['listaFilmes']);

            foreach ($registrosObtidos as $filmeOBJ) {

                if ($filmeOBJ->getTipo() === 'pizza') {
                    ?>

                    <h1><b><?php echo $filmeOBJ->getNome(); ?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo 'R$ ' . $filmeOBJ->getPreco(); ?></span></h1>
                    <p class="w3-text-grey"><?php echo $filmeOBJ->getDescricao(); ?><span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo $filmeOBJ->getDuracao_min() == "Não se aplica" ? "" : $filmeOBJ->getDuracao_min(); ?></span> 
                       <?php if (isset($_SESSION['usuario_logado']) && unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL") : ?>
                            <a href="/IFMS/web2/loja_pizzaria/Controller/PratoController.php?acao=adicionarCarrinho&id=<?php echo $filmeOBJ->getId_filme(); ?>" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Comprar</a>      
        <?php endif; ?>
                    </p>                
                    <hr>

                    <?php
                }
            }
            ?>          
        </div>
        <div id="Filme" class="w3-container menu w3-padding-32 w3-white">


            <?php
            foreach ($registrosObtidos as $filmeOBJ) {

                if ($filmeOBJ->getTipo() == 'filme') {
                    ?>
                    <h1><b><?php echo $filmeOBJ->getNome(); ?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo 'R$ ' . $filmeOBJ->getPreco(); ?></span></h1>
                    <p class="w3-text-grey"><?php echo $filmeOBJ->getDescricao(); ?><span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo $filmeOBJ->getDuracao_min() == "Não se aplica" ? "" : $filmeOBJ->getDuracao_min(); ?></span> 
                        <?php if (isset($_SESSION['usuario_logado']) && unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL") : ?>
                            <a href="/IFMS/web2/loja_locadora/Controller/FilmeController.php?acao=adicionarCarrinho&id=<?php echo $filmeOBJ->getId_filme(); ?>" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Comprar</a>                  
        <?php endif; ?>    
                    </p>   
                    <hr>

                    <?php
                }
            }
            ?>  
        </div>

        <div id="Sobremesa" class="w3-container menu w3-padding-32 w3-white">

            <?php
            foreach ($registrosObtidos as $pratoOBJ) {

                if ($pratoOBJ->getTipo() == 'sobremesa') {
                    ?>
                    <h1><b><?php echo $pratoOBJ->getNome(); ?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo 'R$ ' . $pratoOBJ->getPreco(); ?></span></h1>
                    <p class="w3-text-grey"><?php echo $pratoOBJ->getDescricao(); ?><span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo $pratoOBJ->getTamanho() == "Não se aplica" ? "" : $pratoOBJ->getTamanho(); ?></span> 
                        <?php if (isset($_SESSION['usuario_logado']) && unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL") : ?>
                            <a href="/IFMS/web2/loja_pizzaria/Controller/PratoController.php?acao=adicionarCarrinho&id=<?php echo $pratoOBJ->getId_prato(); ?>" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Comprar</a>                  
        <?php endif; ?>
                    </p>   
                    <hr>
                    <?php
                }
            }
            ?>  
        </div>

        <div id="Bebida" class="w3-container menu w3-padding-32 w3-white">

            <?php
            foreach ($registrosObtidos as $pratoOBJ) {

                if ($pratoOBJ->getTipo() == 'bebida') {
                    ?>
                    <h1><b><?php echo $pratoOBJ->getNome(); ?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo 'R$ ' . $pratoOBJ->getPreco(); ?></span></h1>
                    <p class="w3-text-grey"><?php echo $pratoOBJ->getDescricao(); ?><span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo $pratoOBJ->getTamanho() == "Não se aplica" ? "" : $pratoOBJ->getTamanho(); ?></span> 
                        <?php if (isset($_SESSION['usuario_logado']) && unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL") : ?>
                            <a href="/IFMS/web2/loja_pizzaria/Controller/PratoController.php?acao=adicionarCarrinho&id=<?php echo $pratoOBJ->getId_prato(); ?>" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Comprar</a>                  
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



