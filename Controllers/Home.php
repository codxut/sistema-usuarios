<?php 
	class Home extends Controllers 
	{
		function __construct()
		{	session_start();
			if (isset($_SESSION['login'])) {
				header('Location: '.baseUrl().'dashboard');
			}
			parent::__construct();
		}

		public function home($params)
		{
			//enviando información a las vistas
			$data = [
				'page_tag' => "Login",
				'page_title' => "Login",
				'page_name' => "login",
				'page_id' => 1
			];	

			//comunicación entre controlador y la vista
			$this->views->getView($this, "home", $data);
		}

		public function log()
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$request = $this->model->login($username, $password);
			if (!empty($request)) {
				$_SESSION['id'] = $request['id_user'];
				$_SESSION['login'] = true;
				$data = $this->model->loginRol($_SESSION['id']);
				$_SESSION['data'] = $data;
				$response = ['status' => true, 'msg' => 'Usuario correcto'];
			} else {
				$response = ['status' => false, 'msg' => 'Usuario incorrecto'];
			}
			$json = json_encode($response);
			echo $json;
		}


	}
?>