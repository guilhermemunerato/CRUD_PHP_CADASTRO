<?php
	class categoria
	{
		private $idcategoria;
		private $descritivo;
		
		
		function __construct($idcategoria=null, $descritivo=null)
		{
			$this->idcategoria = $idcategoria;
			$this->descritivo = $descritivo;
		}
		
		function getIdcategoria()
		{
			return $this->idcategoria;
		}
		function getDescritivo()
		{
			return $this->descritivo;
		}
		
		function setIdcategoria($idcategoria)
		{
			$this->idcategoria = $idcategoria;
		}
		function setDescritivo($descritivo)
		{
			$this->descritivo = $descritivo;
		}
		
	}
?>