<?php
	class CategoriaDAO extends Conexao
	{
		function __construct()
		{
			parent:: __construct();
		}
			
		function inserir($categoria)
		{
			//cria a frase sql
			$sql = "INSERT INTO categoria (descritivo) VALUES(?)";
			//prepara a frase
			$stm = $this->db->prepare($sql);
			//substitui o ponto de interrogação pelo conteudo
			$stm->bindValue(1, $categoria->getDescritivo());
			//executar a frase sql no BD
			$stm->execute();
			$this->db = null;
		}
		
		function alterar($categoria)
		{
			$sql = "UPDATE categoria SET descritivo = ? WHERE idcategoria = ?";
			//prepara a frase
			$stm = $this->db->prepare($sql);
			//substituir os pontos de interrogação pelo conteudo
			$stm->bindValue(1, $categoria->getDescritivo());
			$stm->bindValue(2, $categoria->getIdcategoria());
			//executar a frase sql no BD
			$stm->execute();
			//fechar a conexão
			$this->db = null;
			
		}
		
		function excluir($categoria)
		{
			$sql = "DELETE FROM categoria WHERE idcategoria = ?";
			//prepara a frase
			$stm = $this->db->prepare($sql);
			//substituir os pontos de interrogação pelo conteudo
			$stm->bindValue(1, $categoria->getIdcategoria());
			//executar a frase sql no BD
			$stm->execute();
			//fechar a conexão
			$this->db = null;
		}
		
		function buscarTodas()
		{
			$sql = "SELECT * FROM categoria";
			$stm = $this->db->prepare($sql);
			$stm->execute();
			$this->db = null;
			$retorno = $stm->fetchAll(PDO::FETCH_OBJ);
			return $retorno;
			
		}
		
		function buscarUma($categoria)
		{
			$sql = "SELECT * FROM categoria WHERE idcategoria=?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $categoria->getIdcategoria());
			$stm->execute();
			$this->db = null;
			$retorno = $stm->fetchAll(PDO::FETCH_OBJ);
			return $retorno;
			
		}
	}
?>