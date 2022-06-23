<?php
require "../model/CategoriaModel.php";

$categoria = new CategoriaModel();
$categoria->inserir("SmartTV");
$categoria->excluir(1);
$categoria->atualizar(2, "Smartphone");
var_dump($categoria->buscarPorid(3));
var_dump($categoria->buscarTudo());
?>