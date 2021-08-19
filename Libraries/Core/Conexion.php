<?php 
	class Conexion
	{
		protected $conex;

		function __construct()
		{
			$conexStr = 'mysql:host='.DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET;

			try {
				$this->conex = new PDO($conexStr, DB_USER, DB_PASSWORD);
				$this->conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (Exception $e) {
				die("Ha ocurrido un error en la conexión: {$e->getMessage()}");
			}
		}
	}
?>