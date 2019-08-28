<?php
session_start (); // variables superglobales du tableau SESSION
include ('fonctions.php');
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Website - Guillaume Breuil</title>
		<meta charset= "utf8">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<header>
			<h1>Cookie Planet</h1>
		</header>
		<nav>
			<?php
				afficheMenuAdmin();
			?>
		</nav>
		<article>
			<?php
				afficheFormulaireSupprimerMembre();
			?>
		</article>
		<footer>
			Sponsorised by Emperor Palpatine
		</footer>
	</body>
</html>