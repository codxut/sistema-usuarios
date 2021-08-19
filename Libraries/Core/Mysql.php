<?php
	class Mysql extends Conexion
	{
		private $query;
		private $arrData;

		function __construct()
		{
			parent::__construct();
		}

		// insertar registro, retorna el id registrado
		public function insert(string $query, array $arrData)
		{
			$this->query = $query;
			$this->arrData = $arrData;
			$prepare = $this->conex->prepare($this->query);
			$result = $prepare->execute($this->arrData);
			$id = $this->conex->lastInsertId();

			return $id;
		}

		// obtener un registro, retorna un array asociativo con el registro encontrado
		public function get(string $query, array $arrData)
		{
			$this->query = $query;
			$this->arrData = $arrData;
			$prepare = $this->conex->prepare($this->query);
			$prepare->execute($this->arrData);
			$row = $prepare->fetch(PDO::FETCH_ASSOC);

			return $row;
		}

		// obtener todos los registros, retorna un array asociativo
		public function get_all(string $query)
		{
			$this->query = $query;
			$result = $this->conex->prepare($this->query);
			$result->execute();
			$rows = $result->fetchall(PDO::FETCH_ASSOC);

			return $rows;
		}

		// actualizar un registro, retorna 1 o 0
		public function update(string $query, array $arrData)
		{
			$this->query = $query;
			$this->arrData = $arrData;
			$prepare = $this->conex->prepare($this->query);
			$result = $prepare->execute($this->arrData);

			return $result;
		}

		// eliminar un registro, retorna 1 o 0
		public function delete(string $query, array $arrData)
		{
			$this->query = $query;
			$this->arrData = $arrData;
			$prepare = $this->conex->prepare($this->query);
			$result = $prepare->execute($this->arrData);

			return $result;
		}
	}
?>