<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <!-- Include cabeçalho -->

    <?php
    include_once("../fixos/cabecaalho.php");
    require_once __RAIZ__ . '/Model/Filme.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    $id_filme = unserialize($_SESSION['editar_filme'])->getId_filme();
    $nome = unserialize($_SESSION['editar_filme'])->getNome();
    $genero = unserialize($_SESSION['editar_filme'])->getGenero();
    $descricao = unserialize($_SESSION['editar_filme'])->getDescricao();
    $preco = unserialize($_SESSION['editar_filme'])->getPreco();
    $duracao_min = unserialize($_SESSION['editar_filme'])->getDuracao_min();
    ?>
    <head>
        <style>
            a{font-family: 'Press Start 2P'; color:#e30d4b;}
            a:hover {color:#fbed90;}
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">       

        <link rel="stylesheet" type="text/css" href="../css/style.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


    </head>

    <body style="background-image: linear-gradient(90deg, #170103, #3b070c, #880f15, #f98043, #fbed90); ">


        <div class="wrapper fadeInDown">
            <div id="formContent">


                <!-- Icone inserido -->
                <div class="fadeIn first">
                    <h3><?php ?> Cadastro de Filmes</h3>
                </div>


                <!-- Formulário de login -->
                <form method="post" action="../../../Controller/FilmeController.php?acao=cadastrarFilme">
                  


                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="hidden"  class="form-control" id="id_filme" name="id_filme"  value="<?php echo $id_filme; ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="tipo" class="col-sm-2 col-form-label">Tipo:</label>
                        <div class="col-sm-10">

                            <select name="genero" id="genero" class="form-control">
                                <option value="horror">Horror</option>
                                <option value="action">Action</option>
                                <option value="crime">Crime</option>
                                <option value="animation">Animation</option>
                            </select>                            

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="nome" name="nome" placeholder="Insira o nome" value="<?php echo $nome; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="descricao" class="col-sm-2 col-form-label">Descrição:</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="descricao" name="descricao" placeholder="Insira a descrição" value="<?php echo $descricao; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="preco" class="col-sm-2 col-form-label">Preço:</label>
                        <div class="col-sm-10">
                            <input type="number"  class=" form-control" min="1" step="any"  id="preco" name="preco" placeholder="Insira o preço (xx.xx)"  value="<?php echo $preco; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="duracao_min" class="col-sm-2 col-form-label">Duracao:</label>
                        <div class="col-sm-10">
                            <select name="duracao_min" id="duracao_min" class="form-control">
                                <option value="80">80 min</option>
                                <option value="100">100 min </option>
                                <option value="130">130 min</option>
                                <option value="150">150 min</option>
                                <option value="170">170 min</option>
                                <option value="180">180 min</option>
                                <option value="200">200 min</option>
                                <option value="230">230 min</option>
                            </select>     
                        </div>
                    </div>

                    <input type="submit" class="fadeIn second" value="<?php echo $id_filme==null?"Cadastrar":"Editar" ?>" />

            </div>
        </form>



    </div>
</div>

</body>


