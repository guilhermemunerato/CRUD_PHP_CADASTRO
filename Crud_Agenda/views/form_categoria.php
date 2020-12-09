<?php
	if($_POST)
	{
		//verificação
		if($_POST["descritivo"] == "")
		{
			echo "<script>alert('Preencha o Descritivo')</script>";
		}
		else
		{
			require_once "../models/Conexao.class.php";
			require_once "../models/categoria.class.php";
			require_once "../models/CategoriaDAO.class.php";
		
		   //inserir nova categoria no BD
		   
		   $categoria = new categoria(null, $_POST["descritivo"]);
		   $categoriaDAO = new CategoriaDAO();
		   $categoriaDAO->inserir($categoria);
		   header("location:listar_categorias.php");
		}
	}
	require_once "cabecalho.php";
?>
	<div class="content">
		<div class="container">
			<h2 class="mt-5">Nova Categoria</h2><br><br>
			
			<form action="#" method="POST">
				<div class="form-group">
					<p>
						<label for="descritivo" class="col-sm-2 col-form-label">Descritivo</label>
						<div class="col-sm-10">
							<input type="text" id="descritivo" name="descritivo" class="form-control">
						</div>
					</p>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<br><input type="submit" value="Cadastrar" class="btn btn-lg btn-success">
					</div>
				</div>
				</div>
			</form>
		</div>
	</div>
	
<?php
	require_once "rodape.html";
?>