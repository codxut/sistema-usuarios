<?php
	class UsersModel extends Mysql
	{
		private $idUser;
		private $nameUser;
		private $lastnameUser;
		private $emailUser;
		private $phoneUser;
		private $usernameUser;
		private $passwordUser;
		private $rolUser;

		function __construct()
		{
			parent::__construct();
		}

		public function getUsers()
		{
			$query = "SELECT u.id_user, u.name_user, u.lastname_user, u.email_user, u.phone_user, u.id_rol, r.id_rol, r.name_rol FROM users u INNER JOIN rols r ON u.id_rol = r.id_rol";
			$rows = $this->get_all($query);
			return $rows;
		}

		public function insertUser(string $name, string $lastname, string $email, int $phone, string $username, string $password, int $rol)
		{
			$this->nameUser = $name;
			$this->lastnameUser = $lastname;
			$this->emailUser = $email;
			$this->phoneUser = $phone;
			$this->usernameUser = $username;
			$this->passwordUser = $password;
			$this->rolUser = $rol;
			$query = "SELECT * FROM users WHERE email_user = ?";
			$data = [$this->emailUser];
			$result = $this->get($query, $data);
			if (empty($result)) {
				$query = "INSERT INTO users VALUES (default, ?, ?, ?, ?, ?, ?, ?)";
				$arrData = [$this->nameUser, $this->lastnameUser, $this->emailUser, $this->phoneUser, $this->usernameUser, $this->passwordUser, $this->rolUser];
				$result = $this->insert($query, $arrData);
			} else {
				$result = 'register';
			}
			return $result;
		}

		public function getUser(int $id)
		{
			$this->idUser = $id;
			$query = "SELECT * FROM users WHERE id_user = ?";
			$data = [$this->idUser];
			$result = $this->get($query, $data);
			return $result;
		}

		public function updateUser(int $id, string $name, string $lastname, string $email, int $phone, string $username, string $password, int $rol)
		{
			$this->idUser = $id;
			$this->nameUser = $name;
			$this->lastnameUser = $lastname;
			$this->emailUser = $email;
			$this->phoneUser = $phone;
			$this->usernameUser = $username;
			$this->passwordUser = $password;
			$this->rolUser = $rol;
			$query = "UPDATE users SET name_user = ?, lastname_user = ?, email_user = ?, phone_user = ?, username_user = ?, password_user = ?, id_rol = ? WHERE id_user = ?";
			$arrData = [$this->nameUser, $this->lastnameUser, $this->emailUser, $this->phoneUser, $this->usernameUser, $this->passwordUser, $this->rolUser, $this->idUser];
			$result = $this->update($query, $arrData);
			return $result;
		}

		public function deleteUser(int $id)
		{
			$this->idUser = $id;
			$query = "DELETE FROM users WHERE id_user = ?";
			$data = [$this->idUser];
			$result = $this->delete($query, $data);
			return $result;
		}
	}
?>