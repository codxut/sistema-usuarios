<?php 
	class Dashboard extends Controllers 
	{
		function __construct()
		{
			parent::__construct();
			session_start();
			if (empty($_SESSION['login'])) {
				header('Location: '.baseUrl());
			}
		}

		public function dashboard($params)
		{
			//enviando información a las vistas
			$data = [
				'page_tag' => "Dashboard",
				'page_title' => "Dashboard",
				'page_name' => "dashboard",
				'page_id' => 2
			];	

			//comunicación entre controlador y la vista
			$this->views->getView($this, "dashboard", $data);
		}
	}
?>