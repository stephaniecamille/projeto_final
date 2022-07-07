<?php
    require_once 'config/Conexao.php';

    class CategoriaModel{

        function __construct(){
            $this->conexao = Conexao::getConnection();
        }

        function inserir($nome){
            $sql = 'INSERT INTO categoria (nome) VALUE (?)';
            $comando = $this->conexao->prepare($sql);
            $comando->bind_param("s", $nome);
            $comando->execute();
        }

        function excluir($id){
            $sql = 'DELETE FROM categoria WHERE idcategoria = ?';
            $comando = $this->conexao->prepare($sql);
            $comando->bind_param("i", $id);
            $comando->execute();
        }

        function atualizar($nome,$id){
            $sql = "update categoria set nome = ? where idcategoria = ?";
            $comando = $this->conexao->prepare($sql);
            $comando->bind_param("si", $nome, $id);
            $comando->execute();
        }

        function buscarPorId($id){
            $sql = "select * from categoria where idcategoria = ?";
            $comando = $this->conexao->prepare($sql);
            $comando->bind_param("i", $id);
            if($comando->execute()){
                $resultados = $comando->get_result();
                return $resultados->fetch_assoc();
            }
            return null;
        }

        function buscarTodos(){
            $sql = "select * from categoria";
            $comando = $this->conexao->prepare($sql);
            if($comando->execute()){
                $resultados = $comando->get_result();
                return $resultados->fetch_all(MYSQLI_ASSOC);
            }
            return null;
        }
    }

?>