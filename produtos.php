<!DOCTYPE html>
<?php 
include "conexao.php";
$conexao = conectar();

$sql = "SELECT * FROM produtos";
//----------------------------
$rs = mysqli_query($conexao, $sql); ?>

<html>
<head>
	<title></title>
	<meta charset="utf-8">


	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="CSS/produtos.css">

</head>
<body>		
	<nav >
		<div class="nav-wrapper red">
			<a href="#" class="brand-logo">Cofee</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li class="active"><a href="produtos.php">Produtos</a></li>
				<li><a href="pedidos.php">Pedidos</a></li>
				<li><a href="clientes.php">Clientes</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<?php
		if (isset($_GET["msg"])){
			$msg= $_GET["msg"];
			if($_GET["tipo"]=="erro")$cor = "red";
			if($_GET["tipo"]=="sucesso")$cor = "teal";
			echo "<div class ='card-panel $cor'>
			<span class='white-text'>$msg</span>
			</div>";
		}
		?>
		<div class="col s12 m7">
			<div class="card horizontal">
				<div class="card-stacked">
					<div class="card-content">
						<div class="input-field col s6">
							<i class="material-icons prefix">search</i>
							<input id="icon_prefix" type="text" class="validate">
							<label for="icon_prefix">Procurar</label>
						</div>
					</div>
					<div class="card-action">
						<a class="waves-effect waves-ligth grey darken-4 btn modal-trigger" href="#modal-add"><i class="material-icons right">add</i>Novo Produto</a>
					</div>
				</div>
			</div>
		</div>
		<table class="responsive-table highlight ">
			<thead>
				<tr>
					<th>Foto</th>
					<th>Id</th>
					<th>Nome</th>
					<th>Preço</th>
					<th>Qtde</th>
					<th></th>
				</tr>
				<tbody>
					<?php while($produto = mysqli_fetch_assoc($rs)){ ?>
					<tr>
						<td><img class="foto" src="<?php echo $produto['foto']?>"></td>
						<td><?php echo $produto["idProduto"]?></td>
						<td><?php echo $produto["nome"]?></td>
						<td>R$ <?php echo $produto["preco"]?></td>
						<td><?php echo $produto["qtde"]?></td>
						<td>
							<a class="waves-effect waves-light grey darken-4 btn" href="produtos.editar.php">
								<i class="material-icons">border_color</i>
							</a>
							<a class="waves-effect waves-light btn red" href= "produtos-excluir.php?id=<?php echo $produto['idProduto']?>">
								<i class="material-icons">delete</i>
							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</thead>
		</table>
	</div>
	<!-- Modal Structure -->
	<div id="modal-add" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h3>Adicionar Produto</h3>
			<form class="form-inline" id="form" method="POST" action="produtos-inserir.php" enctype="multipart/form-data">
				<div class="row">
					<div class="input-field col"> 
						<input type="text" class="validate" id= "nome" placeholder="Nome do Produto" name="nome" required="on">
					</div>
				</div>

				<div class="row">
					<div class="input-field col s4"> <input type="text" pattern="^\d{1,}[,.]?\d{0,2}?" title="digite um valor entre 0 e 999.999" class="validate" id= "preco" placeholder="Preço" name="preco"  required="on"></div>
					<div class="input-field col s4"> <input type="number" class="validate" id= "qtde" placeholder="Qtde" name="qtde"  required="on"></div>
					<div class="input-field col s4">
						<select name="categoria">
							<option value="" disabled selected>Selecione uma Categoria</option>
							<option value="1">Salgado</option>
							<option value="2">Doce</option>
							<option value="3">Bebida</option>
							<option value="4">Combo</option>
						</select>
						<label>Categoria</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<textarea id="descricao" name="descricao" class="materialize-textarea"></textarea>
						<label for="descricao">Descrição</label>
					</div>

					<div class="file-field input-field col s6">
						<div class="btn">
							<span>Foto</span>
							<input type="file">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
					</div>
				</div>	
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-close waves-effect waves-red red btn-small">Cancel</a>
				<button href="#!" class=" waves-effect waves-green  green btn-small">Add</button>
			</div>
		</form>	
	</div>
</body>
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.modal');
		var options = { };
		var instances = M.Modal.init(elems, options);

		var elems = document.querySelectorAll('select');
		var instances = M.FormSelect.init(elems, options);
	});


</script>
</html>