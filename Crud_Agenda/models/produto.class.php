<?php
	class produto
	{
		private $idproduto;
		private $nome;
		private $descricao;
		private $desconto;
		private $preco;
		private $categoria;
		private $imagem;
		private $status;
		
		function __construct($idproduto=null, $nome=null, $descricao=null, $desconto = null, $preco = null, $categoria = null, $imagem=null, $status=null)
		{
			$this->idproduto = $idproduto;
			$this->nome = $nome;
			$this->descricao = $descricao;
			$this->desconto = $desconto;
			$this->preco = $preco;
			$this->categoria = $categoria;
			$this->imagem = $imagem;
			$this->status = $status;
		}
		
		function getIdproduto()
		{
			return $this->idproduto;
		}
		function getNome()
		{
			return $this->nome;
		}
		
		function getDescricao()
		{
			return $this->descricao;
		}
		function getDesconto()
		{
			return $this->desconto;
		}
		function getPreco()
		{
			return $this->preco;
		}
		function getCategoria()
		{
			return $this->categoria;
		}
		
		function getImagem()
		{
			return $this->imagem;
		}
		
		function getStatus()
		{
			return $this->status;
		}
		
		
		function setIdproduto($idproduto)
		{
			$this->$idproduto = $$idproduto;
		}
		function setNome($nome)
		{
			$this->nome = $nome;
		}
		function setDescricao($descricao)
		{
			$this->descricao = $descricao;
		}
		function setDesconto($desconto)
		{
			$this->desconto = $desconto;
		}
		function setPreco($preco)
		{
			$this->preco = $preco;
		}
		function setCategoria($categoria)
		{
			$this->categoria = $categoria;
		}
		
		function setImagem($imagem)
		{
			$this->imagem = $imagem;
		}
		
		function setStatus($status)
		{
			$this->status = $status;
		}
		
	}
?>