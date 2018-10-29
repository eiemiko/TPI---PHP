<?php 
include "model/ProdutosBD.php";
$id 		= $_GET["id"];
$produtosBD = new ProdutosBD();
$resposta = $produtosBD->excluirProduto($id);
if ($resposta==true){
	$msg = "Produto deletado com sucesso";
	$tipo = "sucesso";
}else{
	$msg = "Erro ao deletar produto ";
	$tipo = "erro";
}
header("Location: produtos.php?msg=$msg&tipo=$tipo");
 ?>