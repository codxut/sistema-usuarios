<?php 
	class Views
	{
		function getView($controller, $view, $data="")
		{
			$controller = ucwords(get_class($controller));
			$view = ucwords($view);
			if ($controller == "Home") {
				$view = VIEWS."$view.php";
			} else {
				$view = VIEWS."$controller/$view.php";
			}
			require_once($view);
		}
	}
?>