<?php

include_once("MODEL/Filme.php");

class FilmeDAO {

    private $conn;

    public function __construct() {
        $controle = ControleConexao::getInstance();
        $this->conn = $controle->get('Connection');
    }

    public function buscarTodos() {
        $statement = $this->conn->query(
                'SELECT * FROM loja_locadora.filme'
        );

        return $this->processaResultados($statement);
    }

    public function buscarRegistro(int $id) {

        $statement = $this->conn->query(
                'SELECT * FROM loja_locadora.filme WHERE id_filme=' . $id
        );

        return $this->processaResultados($statement);
    }

    public function inserir(Filme $filme) {
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                    'INSERT INTO filme (nome, descricao, preco, duracao_min, genero)  VALUES (:nome, :descricao, :preco, :duracao_min, :genero)'
            );


            $stmt->bindValue(':nome', $filme->getNome());
            $stmt->bindValue(':descricao', $filme->getDescricao());
            $stmt->bindValue(':preco', $filme->getPreco());
            $stmt->bindValue(':duracao_min', $filme->getDuracao_min());
            $stmt->bindValue(':genero', $filme->getGenero());
            $stmt->execute();



            $this->conn->commit();
        } catch (Exception $e) {
            print_r($e);
            $this->conn->rollback();
        }
    }

    public function atualizar(Filme $filme) {
        $this->conn->beginTransaction();
        try {
            $stmt = $this->conn->prepare(
                    'UPDATE loja_locadora.filme SET nome=:nome, descricao=:descricao, preco=:preco, duracao_min=:duracao_min, genero=:genero WHERE id_filme=:id_filme'
            );

            $stmt->bindValue(':nome', $filme->getNome());
            $stmt->bindValue(':descricao', $filme->getDescricao());
            $stmt->bindValue(':preco', $filme->getPreco());
            $stmt->bindValue(':duracao_min', $filme->getDuracao_min());
            $stmt->bindValue(':genero', $filme->getGenero());
            $stmt->bindValue(':id_filme', $filme->getId_filme());

            $stmt->execute();



            $this->conn->commit();
        } catch (Exception $e) {
            print_r($e);
            $this->conn->rollback();
        }
    }

    private function processaResultados($statement) {
        $resultados = array();

        if ($statement) {
            while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $filme = new Filme();

                $filme->setId_filme($row->id_filme);
                $filme->setNome($row->nome);
                $filme->setDescricao($row->descricao);
                $filme->setPreco($row->preco);
                $filme->setDuracao_min($row->duracao_min);
                $filme->setGenero($row->genero);


                $resultados[] = $filme;
            }
        }

        return $resultados;
    }

    public function remover(int $id) {
        $this->conn->beginTransaction();

        try {

            $stmt = $this->conn->prepare(
                    'DELETE FROM loja_locadora.filme WHERE  id_filme=:idInserido'
            );

            $stmt->bindValue(':idInserido', $id);
            $stmt->execute();

            $this->conn->commit();
        } catch (Exception $e) {
            print_r($e);
            $this->conn->rollback();
        }
    }

}

?>