<?php 
	/* configurar la carga de los archivos */
	$controllerFile = "Controllers/$controller.php"; // Controllers/home.php

	//validar si existe el archivo
	if (file_exists($controllerFile)) {
		require_once($controllerFile);
		//realizando la instancia del controlador
		$controller = new $controller();
		//validar si existe el método invocado
		if (method_exists($controller, $method)) {
			//llamar al método y enviar los parámetros
			$controller->{$method}($params);
		} else {
			require_once("Controllers/Error.php");
		}
	} else {
		require_once("Controllers/Error.php");
	}
?>