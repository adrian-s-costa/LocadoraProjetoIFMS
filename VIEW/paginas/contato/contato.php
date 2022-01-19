<!DOCTYPE html>

<html>
    <?php
    include_once "../fixos/cabecaalho.php";
    ?>
<head>
  <title>Locadora Drive - E-mail</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="VIEW\paginas\css\email.css">
    
    

<div class="login-page">
  <div class="form">
    <p class="message">Tem uma sugestão? Envie-nos um email
    
    <form action="Controller/ContatoController.php?action=enviarEmail" method="post" target="_blank">
            <p><input  placeholder="Nome"
                      required="" name="nome" type="text"></p>
    
    <p><input  placeholder="Email"
                      required="" name="email" type="email"></p>
    
    <textarea placeholder="Insira a mensagem que você deseja nos enviar"
              required="" name="mensagem"></textarea>
    <button class="" type="submit">Enviar mensagem</button>
    </form>
  </div>
</div>
</body>
</html>