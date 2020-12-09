<?php
	require_once "cabecalho.php";
?>
	<div class="content">
		<div class="container">
			<h2 class="mt-5">Lista de Produtos</h2><br><br>
			<table class="table table-striped">
				<tr>
					<th>Código</th>
					<th>Produto</th>
					<th>Ações</th>
				</tr>
				<?php
					require_once "../models/Conexao.class.php";
				
					require_once "../models/ProdutoDAO.class.php";
					$produtoDAO = new ProdutoDAO();
					$retorno = $produtoDAO->buscarTodos();
					foreach($retorno as $dado)
					{
						echo "<tr>";
						echo "<td>{$dado->idproduto}</td>";
						echo "<td>{$dado->nome}</td>";
						echo "<td><a class='btn btn-sm btn-warning' href='edit_produto.php?id={$dado->idproduto}'>Alterar</a>";
						if($dado->status == "A")
						{
							echo "&nbsp;&nbsp;<a class='btn btn-sm btn-warning' href='delete_produto.php?id={$dado->idproduto}&status=I'>Inativar</a></td>";
						}
						else
						{
							echo "&nbsp;&nbsp;<a class='btn btn-sm btn-warning' href='delete_produto.php?id={$dado->idproduto}&status=A'>Ativar</a></td>";
						}
						echo "</tr>";
					}
					?>
			</table>
			<br><br><a class="btn btn-lg btn-success" href="form_produto.php">Novo Produto</a>
		</div>
	</div>
<?php
		require_once "rodape.html";
?>