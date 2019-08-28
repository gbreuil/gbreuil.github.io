<?php
if (!empty($_SESSION['login']) && !empty($_SESSION['password'])) {
	$login = $_SESSION['login'];
	$password = $_SESSION['password'];
	if($login == "felix" && $password == "felix22")
	{
		afficheMenuAdmin();
	}
	else{
		afficheMenuMembre();
	}
}
else {
	afficheFormulaireConnexion();
	echo 'Please fill cases to sign in';
}
?>
