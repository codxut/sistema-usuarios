<?php
	class Users extends Controllers
	{
		function __construct()
		{	
			parent::__construct();
			session_start();
			if (empty($_SESSION['login'])) {
				header('Location: '.baseUrl());
			}
		}

		public function users($params)
		{
			//enviando información a las vistas
			$data = [
				'page_tag' => "Usuarios",
				'page_title' => "Usuarios",
				'page_name' => "usuarios",
				'page_id' => 3
			];	

			//comunicación entre controlador y la vista
			$this->views->getView($this, "users", $data);
		}

		public function getUsers()
		{
			$data = $this->model->getUsers();
			for ($i = 0; $i < count($data); $i++) {
				if ($_SESSION['data']['id_rol'] == 2) {
					$data[$i]['accion_rol'] = '<div class="text-center">
						<button class="btn btn-warning btnEditUser" type="button" rl="'.$data[$i]['id_user'].'" title="Editar" disabled style="cursor: not-allowed;"><i class="fas fa-edit"></i></button>
						<button class="btn btn-danger btnDeleteUser" type="button" rl="'.$data[$i]['id_user'].'" title="Eliminar" disabled style="cursor: not-allowed;"><i class="fas fa-trash"></i></button>
					</div>';
				} else {
					$data[$i]['accion_rol'] = '<div class="text-center">
						<button class="btn btn-warning btnEditUser" type="button" rl="'.$data[$i]['id_user'].'" title="Editar"><i class="fas fa-edit"></i></button>
						<button class="btn btn-danger btnDeleteUser" type="button" rl="'.$data[$i]['id_user'].'" title="Eliminar;""><i class="fas fa-trash"></i></button>
					</div>';
				}
			}
			$json = json_encode($data);
			echo $json;
		}

		public function insertUser()
		{
			$iduser = intval($_POST['iduser']);
			$name = $_POST['name'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$rol = $_POST['rol'];
			if ($iduser == 0) {
				$request = $this->model->insertUser($name, $lastname, $email, $phone, $username, $password, $rol);
			} else {
				$request = $this->model->updateUser($iduser, $name, $lastname, $email, $phone, $username, $password, $rol);
			}
			if ($request > 0) {
				$arrResponse = ['status' => true, 'msg' => 'Datos de usuario almacenado.'];
			} else if ($request == 'register') {
				$arrResponse = ['status' => false, 'msg' => 'El usuario registrado ya existe.'];
			} else {
				$arrResponse = ['status' => false, 'msg' => 'No se ha podido registrar el usuario.'];
			}
			$json = json_encode($arrResponse);
			echo $json;
		}

		public function getUser(int $id)
		{
			if ($id > 0) {
				$request = $this->model->getUser($id);
				if (empty($request)) {
					$arrResponse = ['status' => false, 'msg' => 'Usuario no encontrado.'];
				} else {
					$arrResponse = ['status' => true, 'msg' => $request];
				}
				$json = json_encode($arrResponse);
				echo $json;
			}
		}

		public function deleteUser()
		{
			$iduser = $_POST['iduser'];
			$request = $this->model->deleteUser($iduser);
			if ($request > 0) {
				$arrResponse = ['status' => true, 'msg' => 'Usuario eliminado correctamente.'];
			} else {
				$arrResponse = ['status' => false, 'msg' => 'No se ha podido eliminar.'];
			}
			$json = json_encode($arrResponse);
			echo $json;
		}
	}
?>