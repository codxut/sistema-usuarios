<?php 
	function baseUrl()
	{
		return BASE_URL;
	}

	function baseMedia()
	{
		return BASE_URL."Assets/";
	}

	function formatArr(array $arr)
	{
		$format = print_r("<pre>");
		$format .= print_r($arr);
		$format .= print_r("</pre>");
		return $format;
	}

	function head($data = "")
	{
		$view_header = VIEWS."Template/head.php";
		require_once($view_header);
	}

	function footer($data = "")
	{
		$view_footer = VIEWS."Template/footer.php";
		require_once($view_footer);
	}

	function nav($data = "")
	{
		$view_footer = VIEWS."Template/nav.php";
		require_once($view_footer);
	}

	function getModal(string $name, $data)
	{
		$view_modal = VIEWS."Template/Modals/$name.php";
		require_once($view_modal);
	}

	function strClean(string $cadena)
	{
		$string = preg_replace(['/\s+/','/^\s|\s$/'], [' ', ''], $cadena); //elimina los espacio entre palabras
		$string = trim($string); //elimina espacios del inicio y final
		$string = stripslashes($string); //elimina las barras invertidas
		$string = str_ireplace("<script>", "", $string); //limpia las palabras inadecuadas
		$string = str_ireplace("</script>", "", $string);
		$string = str_ireplace("<script src>", "", $string);
		$string = str_ireplace("<script type>", "", $string);
		$string = str_ireplace("SELECT * FROM", "", $string);
		$string = str_ireplace("DELETE FROM", "", $string);
		$string = str_ireplace("INSERT INTO", "", $string);
		$string = str_ireplace("SELECT COUNT(*) FROM", "", $string);
		$string = str_ireplace("DROP TABLE", "", $string);
		$string = str_ireplace("OR '1'='1'", "", $string);
		$string = str_ireplace('OR "1" = "1"', "", $string);
		$string = str_ireplace("is NULL; --", "", $string);
		$string = str_ireplace("LIKE '", "", $string);
		$string = str_ireplace('LIKE "', "", $string);
		$string = str_ireplace("LIKE `", "", $string);
		$string = str_ireplace("OR 'a'='a'", "", $string);
		$string = str_ireplace('OR "a" = "a"', "", $string);
		$string = str_ireplace('OR `a` = `a`', "", $string);
		$string = str_ireplace("--", "", $string);
		$string = str_ireplace("^", "", $string);
		$string = str_ireplace("[", "", $string);
		$string = str_ireplace("]", "", $string);
		$string = str_ireplace("==", "", $string);
		return $string;
	}
?>