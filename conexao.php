<?php 

function conectar(){
	$server = "localhost";
	$user = "root";
	$pass = "vertrigo";
	$db = "cafeteria"; 
	$conexao = mysqli_connect ($server, $user, $pass, $db);
	return $conexao;
}