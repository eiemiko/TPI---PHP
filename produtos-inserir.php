<?php 
include "model/ProdutosBD.php";


$arquivo ="fotos/".basename($_FILE["foto"]["name"]);

// pegar os dados do formulario


$produto = new Produto();
$produto->nome = $_POST["nome"];
$produto->preco = $_POST["preco"];
$produto->qtde =$_POST["qtde"];
$produto->categoria = $_POST["categoria"];
$produto->descricao = $_POST["descricao"];
$produto->foto = $arquivo;


move_uploaded_file($_FILE["foto"]["tmp_name"], 
$arquivo);

$produtosBD = new ProdutosBD();
$resposta = $produtosBD->inserirProduto($produto);

if($resposta==true){
	$msg = "Produto inserido com sucesso";
	$tipo = "sucesso";
}
else{
	$msg = "erro ao inserir produto.";
	$tipo = "erro";
}
header("Location: produtos.php?msg=$msg&tipo=$tipo");


// executar o insert

?>
