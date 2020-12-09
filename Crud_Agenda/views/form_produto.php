<?php
	if($_POST)
	{
		//verificação
		$erro = 0;
		if($_POST["nome"] == "")
		{
			echo "<script>alert('Preencha o Nome do Produto')</script>";
			$erro++;
		}
		if($_POST["descricao"] == "")
		{
			echo "<script>alert('Preencha a Descrição do Produto')</script>";
			$erro++;
		}
		if($_POST["desconto"] == "")
		{
			echo "<script>alert('Preencha o Desconto')</script>";
			$erro++;
		}
		if($_POST["preco"] == "")
		{
			echo "<script>alert('Preencha o Preço do Produto')</script>";
			$erro++;
		}
		if($_POST["imagem"] == "")
		{
			echo "<script>alert('Preencha o Nome da Imagem do Produto')</script>";
			$erro++;
		}
		if($_POST["categoria"] == "0")
		{
			echo "<script>alert('Escolha a Categoria do Produto')</script>";
			$erro++;
		}
		
		if($erro == 0)
		{
			require_once "../models/Conexao.class.php";
			require_once "../models/categoria.class.php";
			require_once "../models/ProdutoDAO.class.php";
			require_once "../models/produto.class.php";
		
		   //inserir novo Produto no BD
		   
		   $categoria = new categoria($_POST["categoria"]);
		   
		   $produto = new produto(null, $_POST["nome"],$_POST["descricao"], $_POST["desconto"], $_POST["preco"], $categoria,  $_POST["imagem"], "A");
		   
		   $produtoDAO = new ProdutoDAO();
		   $produtoDAO->inserir($produto);
		   header("location:listar_produtos.php");
		}
	}
	require_once "cabecalho.php";
?>
	<div class="content">
		<div class="container">
			<h2 class="mt-5">Novo Produto</h2><br><br>
			
			<form action="#" method="POST">
				<div class="form-group">
					<label for="nome" class="col-sm-2 col-form-label">Nome do Produto</label>
					<div class="col-sm-10">
						<input type="text" id="nome" name="nome" class="form-control">
					</div>
					
				</div>
				<div class="form-group">
					<label for="descricao" class="col-sm-2 col-form-label">Descrição do Produto</label>
					<div class="col-sm-10">
						<textarea name="descricao"></textarea>
					</div>
					
				</div>
				<div class="form-group">
					<label for="desconto" class="col-sm-2 col-form-label">Desconto</label>
					<div class="col-sm-10">
						<input type="text" id="desconto" name="desconto" class="form-control">
					</div>
					
				</div>
				<div class="form-group">
					<label for="preco" class="col-sm-2 col-form-label">Preço</label>
					<div class="col-sm-10">
						<input type="text" id="preco" name="preco" class="form-control">
					</div>
					
				</div>
				<div class="form-group">
					<label for="imagem" class="col-sm-2 col-form-label">Imagem do Produto</label>
					<div class="col-sm-10">
						<input type="text" id="imagem" name="imagem" class="form-control">
					</div>
					
				</div>
				<div class="form-group">
					<label for="categoria" class="col-sm-2 col-form-label">Categoria do Produto</label>
					<div class="col-sm-10">
						<select name="categoria">
							<option value="0">Escolha uma Categoria</option>
		<?php
			require_once "../models/conexao.class.php";
			require_once "../models/CategoriaDAO.class.php";
			$categoriaDAO = new CategoriaDAO();
			$retorno = $categoriaDAO->buscarTodas();
			if(count($retorno) > 0)
			{
				//criar os options do select
				foreach($retorno as $dado)
				{
					echo "<option value='{$dado->idcategoria}'>{$dado->descritivo}</option>";
				}
			}
			else
			{
				//não tem categoria cadastrada no BD
				echo "<script>alert('Não há categorias cadastradas no Banco de Dados')</script>";
			}
		?>
						</select>
					</div>
					
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