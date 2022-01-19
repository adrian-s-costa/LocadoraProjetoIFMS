<?php

class PedidoFilme {
 
    private $fk_id_pedido;
    private $fk_id_filme;
    private $quantidade;

    function getFk_id_pedido() {
        return $this->fk_id_pedido;
    }

    function getFk_id_filme() {
        return $this->fk_id_filme;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function setFk_id_pedido($fk_id_pedido): void {
        $this->fk_id_pedido = $fk_id_pedido;
    }

    function setFk_id_filme($fk_id_filme): void {
        $this->fk_id_filme = $fk_id_filme;
    }

    function setQuantidade($quantidade): void {
        $this->quantidade = $quantidade;
    }


 
}


