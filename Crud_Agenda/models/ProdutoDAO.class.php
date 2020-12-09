<?php
	class ProdutoDAO extends Conexao
	{
		function __construct()
		{
			parent:: __construct();
		}
			
		function inserir($produto)
		{
			//cria a frase sql
			$sql = "INSERT INTO produto (categoria_idcategoria, nome, descricao, desconto, preco, imagem, status ) VALUES(?,?,?,?,?,?,?)";
			//prepara a frase
			$stm = $this->db->prepare($sql);
			//substitui o ponto de interrogação pelo conteudo
			$stm->bindValue(1, $produto->getCategoria()->getIdcategoria());
			$stm->bindValue(2, $produto->getNome());
			$stm->bindValue(3, $produto->getDescricao());
			$stm->bindValue(4, $produto->getDesconto());
			$stm->bindValue(5, $produto->getPreco());
			$stm->bindValue(6, $produto->getImagem());
			$stm->bindValue(7, $produto->getStatus());
			//executar a frase sql no BD
			$stm->execute();
			$this->db = null;
		}
		
		function alterar($produto)
		{
			
			$sql = "UPDATE produto SET categoria_idcategoria = ?, nome = ?, descricao = ?, desconto = ?, preco = ?, imagem = ? WHERE idproduto = ?";
			//prepara a frase
			$stm = $this->db->prepare($sql);
			//substituir os pontos de interrogação pelo conteudo
			$stm->bindValue(1, $produto->getCategoria()->getIdcategoria());
			$stm->bindValue(2, $produto->getNome());
			$stm->bindValue(3, $produto->getDescricao());
			$stm->bindValue(4, $produto->getDesconto());
			$stm->bindValue(5, $produto->getPreco());
			$stm->bindValue(6, $produto->getImagem());
			$stm->bindValue(7, $produto->getIdproduto());
			
			//executar a frase sql no BD
			$stm->execute();
			//fechar a conexão
			$this->db = null;
			
		}
		
		function excluirLogico($produto)
		{
			$sql = "UPDATE produto SET status = ? WHERE idproduto = ?";
			//prepara a frase
			$stm = $this->db->prepare($sql);
			//substituir os pontos de interrogação pelo conteudo
			$stm->bindValue(1, $produto->getStatus());
			$stm->bindValue(2, $produto->getIdproduto());
			//executar a frase sql no BD
			$stm->execute();
			//fechar a conexão
			$this->db = null;
		}
		
		function buscarTodos()
		{
			$sql = "SELECT * FROM produto";
			$stm = $this->db->prepare($sql);
			$stm->execute();
			$this->db = null;
			$retorno = $stm->fetchAll(PDO::FETCH_OBJ);
			return $retorno;
			
		}
		
		function buscarUm($produto)
		{
			$sql = "SELECT * FROM produto WHERE idproduto=?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $produto->getIdproduto());
			$stm->execute();
			$this->db = null;
			$retorno = $stm->fetchAll(PDO::FETCH_OBJ);
			return $retorno;
			
		}
	}
?>