<?php
session_start (); // variables superglobales du tableau SESSION
include ('fonctions.php');
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
				echo"<table>";
				$membres = listeMembres();
				afficheTableauHTML($membres);
				echo"</table>";
			?>
		</article>
		<footer>
			Sponsorised by Emperor Palpatine
		</footer>
	</body>
</html>