<?php
	if($_GET)
	{
		require_once "../models/Conexao.class.php";
		require_once "../models/produto.class.php";
		require_once "../models/ProdutoDAO.class.php";
		$produto = new produto($_GET["id"],null, null, null, null, null, null, $_GET["status"]);
		
		
		$produtoDAO = new ProdutoDAO();
		$produtoDAO->excluirLogico($produto);
		header("location:listar_produtos.php");
	}
?>