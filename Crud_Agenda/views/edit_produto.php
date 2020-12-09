<?php
	require_once "../models/Conexao.class.php";
	require_once "../models/categoria.class.php";
	require_once "../models/ProdutoDAO.class.php";
	require_once "../models/produto.class.php";
	require_once "../models/CategoriaDAO.class.php";
	
	if($_GET)
	{
		$produto = new produto($_GET["id"]);
		$produtoDAO = new produtoDAO();
		$ret = $produtoDAO->buscarUm($produto);
	}
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
			
		if($erro == 0)
		{
			
		
		   //alterar o Produto no BD
		   
		   $categoria = new categoria($_POST["categoria"]);
		   
		   $produto = new produto($_POST["id"], $_POST["nome"],$_POST["descricao"], $_POST["desconto"], $_POST["preco"], $categoria,  $_POST["imagem"]);
		   
		   $produtoDAO = new ProdutoDAO();
		   $produtoDAO->alterar($produto);
		   header("location:listar_produtos.php");
		}
	}
	require_once "cabecalho.php";
?>
	<div class="content">
		<div class="container">
			<h2 class="mt-5">Alteração do Produto</h2><br><br>
			
			<form action="#" method="POST">
			
				<input type="hidden" name="id" value="<?php echo $ret[0]->idproduto; ?>">
				
				<div class="form-group">
					<label for="nome" class="col-sm-2 col-form-label">Nome do Produto</label>
					<div class="col-sm-10">
						<input type="text" id="nome" name="nome" class="form-control" value="<?php echo $ret[0]->nome; ?>">
					</div>
					
				</div>
				<div class="form-group">
					<label for="descricao" class="col-sm-2 col-form-label">Descrição do Produto</label>
					<div class="col-sm-10">
						<textarea name="descricao"><?php echo $ret[0]->descricao; ?></textarea>
					</div>
					
				</div>
				<div class="form-group">
					<label for="desconto" class="col-sm-2 col-form-label">Desconto</label>
					<div class="col-sm-10">
						<input type="text" id="desconto" name="desconto" class="form-control" value="<?php echo $ret[0]->desconto; ?>">
					</div>
					
				</div>
				<div class="form-group">
					<label for="preco" class="col-sm-2 col-form-label">Preço</label>
					<div class="col-sm-10">
						<input type="text" id="preco" name="preco" class="form-control" value="<?php echo $ret[0]->preco; ?>">
					</div>
					
				</div>
				<div class="form-group">
					<label for="imagem" class="col-sm-2 col-form-label">Imagem do Produto</label>
					<div class="col-sm-10">
						<input type="text" id="imagem" name="imagem" class="form-control" value="<?php echo $ret[0]->imagem; ?>">
					</div>
					
				</div>
				<div class="form-group">
					<label for="categoria" class="col-sm-2 col-form-label">Categoria do Produto</label>
					<div class="col-sm-10">
						<select name="categoria">
							
		<?php
			
			
			$categoriaDAO = new CategoriaDAO();
			$retorno = $categoriaDAO->buscarTodas();
			if(count($retorno) > 0)
			{
				//criar os options do select
				foreach($retorno as $dado)
				{
					if($dado->idcategoria == $ret[0]->categoria_idcategoria)
					{
						echo "<option value='{$dado->idcategoria}' selected>{$dado->descritivo}</option>";
					}
					else
					{
						echo "<option value='{$dado->idcategoria}'>{$dado->descritivo}</option>";
					}
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
						<br><input type="submit" value="Alterar" class="btn btn-lg btn-success">
					</div>
				</div>
				</div>
			</form>
		</div>
	</div>
	
<?php
	require_once "rodape.html";
?>