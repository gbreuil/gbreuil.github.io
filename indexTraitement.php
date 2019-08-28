<?php
	$login = $_POST["login"];
	$password = $_POST["password"];
	$submit = $_POST["submit"];
	
	if(!empty($submit))
	{
		session_start();
		$_SESSION['login'] = $login;
		$_SESSION['password'] = $password;
		header ('location: index.php');
	}
?>