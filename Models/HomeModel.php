<?php
	class HomeModel extends Mysql
	{
		private $username;
		private $password;

		function __construct()
		{
			parent::__construct();
		}

		public function login(string $username, string $password)
		{
			$this->username = $_POST['username'];
			$this->password = $_POST['password'];

			$query = "SELECT * FROM users WHERE username_user = ? AND password_user = ?";
			$arrData = [$this->username, $this->password];
			
			$result = $this->get($query, $arrData);

			return $result;
		}

		public function loginRol(int $id)
		{
			$query = "SELECT u.id_user, u.name_user, u.lastname_user, r.id_rol, r.name_rol FROM users u INNER JOIN rols r ON u.id_rol = r.id_rol WHERE u.id_user = ?";
			$arrData = [$id];
			$result = $this->get($query, $arrData);

			return $result;
		}	
	}
?>