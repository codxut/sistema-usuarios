<?php 
	require_once("Config/Config.php");
	require_once("Helpers/Helpers.php");
	
	//en la primera posición el controlador, luego el método, y otros son los parámetros.
	$url = isset($_GET['url']) ? $_GET['url'] : "home/home";
	$arrUrl = explode('/', $url);
	$controller = ucwords($arrUrl[0]);
	$method = $arrUrl[0];
	$params = "";
	
	//validar si existe un método
	if (!empty($arrUrl[1])) {
		$method = $arrUrl[1];
	}

	//validar si existe un parámetro
	if (!empty($arrUrl[2])) {
		for ($i = 2; $i < count($arrUrl); $i++) {
			$params .= "$arrUrl[$i],";
		}
		$params = trim($params, ',');
	}

	require_once(LIBS."Core/Autoload.php");
	require_once(LIBS."Core/Load.php");
?>