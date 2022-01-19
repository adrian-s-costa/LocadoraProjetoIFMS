<?php

class Filme {
 
    private $id_filme;
    private $nome;
    private $descricao;
    private $preco;
    private $duracao_min;
    private $genero;
 


    function getId_filme() {
        return $this->id_filme;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getPreco() {
        return $this->preco;
    }

    function getDuracao_min() {
        return $this->duracao_min;
    }

    function getGenero() {
        return $this->genero;
    }

    function setId_filme($id_filme): void {
        $this->id_filme = $id_filme;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }

    function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }

    function setPreco($preco): void {
        $this->preco = $preco;
    }

    function setDuracao_min($duracao_min): void {
        $this->duracao_min = $duracao_min;
    }

    function setGenero($genero): void {
        $this->genero = $genero;
    }



 
}


