<?php
	require_once "cabecalho.php";
?>
	<div class="content">
		<div class="container">
			<h2 class="mt-5">Lista de Categorias</h2><br><br>
			<table class="table table-striped">
				<tr>
					<th>Código</th>
					<th>Descritivo</th>
					<th>Ações</th>
				</tr>
				<?php
					require_once "../models/Conexao.class.php";
				
					require_once "../models/CategoriaDAO.class.php";
					$categoriaDAO = new CategoriaDAO();
					$retorno = $categoriaDAO->buscarTodas();
					foreach($retorno as $dado)
					{
						echo "<tr>";
						echo "<td>{$dado->idcategoria}</td>";
						echo "<td>{$dado->descritivo}</td>";
						echo "<td><a class='btn btn-sm btn-warning' href='edit_categoria.php?id={$dado->idcategoria}'>Alterar</a>";
					?>
						&nbsp;&nbsp;<a class="btn btn-sm btn-danger" href="delete_categoria.php?id=<?php echo $dado->idcategoria;?>" onclick = "return confirm('Confirma a exclusão da categoria?')">Excluir</a></td>
					<?php
						echo "</tr>";
					}
					?>
			</table>
			<br><br><a class="btn btn-lg btn-success" href="form_categoria.php">Nova Categoria</a>
		</div>
	</div>
<?php
		require_once "rodape.html";
?>