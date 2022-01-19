<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <!-- Include cabeçalho -->

    <?php
    include_once "../fixos/cabecaalho.php";
    ?>
    <head>
        
        <style>
            a{font-family: 'Press Start 2P'; color:#e30d4b;}
            a:hover {color:#fbed90;}
        </style>
        
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">      

        <!--css criado para paginas desse estilo de gerenciamento-->
        <link rel="stylesheet" type="text/css" href="../css/tabelas.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <!--Icones-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">




        <script>
            $(document).ready(function () {
                // Activate tooltip
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>



    </head>

    <body style="background-image: linear-gradient(90deg, #170103, #3b070c, #880f15, #f98043, #fbed90); ">


        <div class="container">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-xs-7">
                                <h2>Gerenciar <b>Pedidos</b></h2>
                            </div>

                            <div class="col-xs-7">
    <!--<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Adicionar novo Prato</span></a>-->
                                <a href="/IFMS/web2/loja_locadora/Controller/AdminController.php?acao=listarCancelados"   class="btn btn-success" data-toggle='tooltip' title="Listar Pedidos Cancelados" >
                                    <i class="material-icons" data-toggle="tooltip" >search</i> <span>Exibir "Cancelados"</span></a>      

                                <a href="/IFMS/web2/loja_locadora/Controller/AdminController.php?acao=listarFinalizados"    class="btn btn-success" data-toggle='tooltip' title="Listar Pedidos Finalizados"  >
                                    <i class="material-icons" data-toggle="tooltip" >search</i> <span>Exibir "Finalizados"</span></a>    


                                <a href="/IFMS/web2/loja_locadora/Controller/AdminController.php?acao=listarPedidosUsuarios"    class="btn btn-success" data-toggle='tooltip' title="Listar Pedidos Em Andamento"  >
                                    <i class="material-icons" data-toggle="tooltip" >search</i> <span>Exibir "Em Andamento"</span></a>    

                            </div>

                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Valor Total</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $registrosObtidos = unserialize($_SESSION['listaPedidos']);
                            foreach ($registrosObtidos as $pedidoOBJ) {
                                ?>

                                <tr>
                                    <td><?php echo $pedidoOBJ->getData(); ?></td>
                                    <td><?php echo $pedidoOBJ->getUsuario()->getNome(); ?></td>
                                    <td><?php echo $pedidoOBJ->getUsuario()->getEmail(); ?></td>
                                    <td><?php echo $pedidoOBJ->getUsuario()->getTelefone(); ?></td>
                                    <td><?php echo 'R$ ' . $pedidoOBJ->getValorTotal(); ?></td>
                                    <td><?php echo $pedidoOBJ->getStatus(); ?></td>
                                    <td>
                                        <a href="/IFMS/web2/loja_locadora/Controller/AdminController.php?acao=finalizarPedido&id=<?php echo $pedidoOBJ->getId_pedido(); ?>"  class="edit" data-toggle='tooltip'>
                                            <i class="material-icons" data-toggle="tooltip" title="Finalizar Pedido">done</i></a>                                              
                                        <a href="/IFMS/web2/loja_locadora/Controller/AdminController.php?acao=cancelarPedido&id=<?php echo $pedidoOBJ->getId_pedido(); ?>" class="delete" data-toggle='tooltip'>
                                            <i class="material-icons" data-toggle="tooltip" title="Cancelar Pedido">remove_circle</i></a>                                  

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>        
        </div>



    </body>
