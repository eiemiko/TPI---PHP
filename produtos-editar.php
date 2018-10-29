<?php
include "model/produtosBD.php";
$id = $_GET["id"];

$produtosBD = new ProdutosBD();
$produto = new Produto();
$produto =$produtosBD->getProduto($id);

header("Location: produtos.php?
	id=$produto->id
	&nome=$produto->nome
	&preco=$produto->preco
	&qtde=$produto->qtde
	&categoria=$produto->categoria
	&descricao=$produto->descricao");
?>