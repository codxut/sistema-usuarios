<?php 
	class Logout
	{
		function __construct()
		{
			session_start();
			session_unset(); //destruir todas las variables de sesión
			session_destroy();
			header('Location: '.baseUrl());
		}
	}
?>