<?php 
	class Controllers 
	{
		function __construct()
		{
			$this->views = new Views();
			$this->loadModel();
		}

		public function loadModel()
		{
			$model = get_class($this)."Model"; //HomeModel*
			$routeModel = "Models/$model.php"; // Models/HomeModel.php
			if (file_exists($routeModel)) {
				require_once($routeModel);
				$this->model = new $model();
			}
		}
	}
?>