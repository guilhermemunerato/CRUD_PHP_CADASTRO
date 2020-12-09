<?php
	abstract class Conexao
	{
		protected $db;
		
		function __construct()
		{
			//parâmetros para criar a conexao com o BD - qual BD, nome servidor, nome da base de dados e o charset (Caracteres)
			
			$parametros = "mysql:host=localhost;dbname=loja;charset=utf8mb4";
			
			//criar objeto PDO - parâmetros de conexão + usuário do BD + senha
			
			$this->db = new PDO($parametros, "root", "");
		}
	}
?>