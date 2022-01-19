<!DOCTYPE html>

<html>
    <?php
    include_once "../fixos/cabecaalho.php";
    ?>
<head>
    <link rel="stylesheet" type="text/css" href="../css/formcss.css">
  <title>Locadora Drive - Registrar</title>
</head>
<body>


        <?php
                if (isset($_SESSION['mensagemSistema'])):
                    $mensagem = isset($_SESSION['mensagemSistema']) ? $_SESSION['mensagemSistema'] : "";
                    ?>

                    <div class="alert alert-danger" role="alert">
                        <strong><?php echo $mensagem; ?></strong> 
                    </div>

                    <?php
                    unset($_SESSION['mensagemSistema']);
                endif;
                ?>

<div class="login-page">
  <div class="form">
    <form method="post" action="../../../Controller/UsuarioController.php?acao=efetuarLogin">
      <input type="text" id="loginInserido" class="fadeIn second" name="loginInserido" placeholder="insira o login (email)"/>
      <input id="senhaLogin" class="fadeIn third" name="senhaLogin" placeholder="insira a senha"/>
      <input type="submit" class="blogin" value="Logar">
    </form>
      <p class="message">Não tem conta? <a href="cadastro_usuario.php">Crie uma conta</a></p>
  </div>
    
</div>
</body>
</html>
