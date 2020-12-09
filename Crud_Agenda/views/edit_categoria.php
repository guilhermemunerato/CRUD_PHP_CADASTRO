<?php
	require_once "../models/Conexao.class.php";
	require_once "../models/categoria.class.php";
	require_once "../models/CategoriaDAO.class.php";
	if($_GET)
	{
		$categoria = new categoria($_GET["id"]);
		$categoriaDAO = new categoriaDAO();
		$retorno = $categoriaDAO->buscarUma($categoria);
	}
	if($_POST)
	{
		//verificação
		if($_POST["descritivo"] == "")
		{
			echo "<script>alert('Preencha o Descritivo')</script>";
		}
		else
		{
		   //Alterar categoria no BD
		   
		   $categoria = new categoria($_POST["id"], $_POST["descritivo"]);
		   $categoriaDAO = new CategoriaDAO();
		   $categoriaDAO->alterar($categoria);
		   header("location:listar_categorias.php");
		}
	}//post
	require_once "cabecalho.php";
?>
	<div class="content">
		<div class="container">


		<h2 class="mt-5">Alteração da Categoria</h2><br><br>
		
		<form action="#" method="POST">
			<div class = "form-group">
				<input type="hidden" name="id" value="<?php echo $retorno[0]->idcategoria; ?>">
				<p>
					<label for="descritivo" class="col-sm-2 col-form-label">Descritivo:</label>
					<div class="col-sm-10">
						<input type="text" id="descritivo" class="form-control" name="descritivo" value="<?php echo $retorno[0]->descritivo; ?>">
					</div>
				</p>
			</div>
			<div class="form-group">
				<div class="col-sm-10">
					<br><input type="submit" value="Alterar" class="btn btn-lg btn-success">
				</div>
			</div>
			
		</form>
	</div>
	</div>
<?php
	require_once "rodape.html";
?>