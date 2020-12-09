<?php
	if($_GET)
	{
		require_once "../models/Conexao.class.php";
		require_once "../models/categoria.class.php";
		require_once "../models/CategoriaDAO.class.php";
		$categoria = new categoria($_GET["id"]);
		$categoriaDAO = new CategoriaDAO();
		$categoriaDAO->excluir($categoria);
		header("location:listar_categorias.php");
	}
?>