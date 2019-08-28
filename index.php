<?php
include ('fonctions.php');
session_start(); // variables superglobales du tableau SESSION
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
			<h1>
				Cookie Planet
			</h1>
		</header>
		<nav>
		<?php
			if(!empty($_SESSION))
			{
				include("ouvrir_session.php"); //affiche la liste de commandes
			}
			else
			{
				afficheFormulaireConnexion(); // affiche le formulaire de connexion
			}
		?>
		</nav>
			<section>
				<br/>
				<div id="barre">
					<ul>
						<li><a href="index.php">Main Page</a></li>
						<li><a href="Chewbacca_Cookies.php">Chewbacca Cookies</a></li>
						<li><a href="About.php">About this site</a></li>
					</ul>
				</div>
				<article>
					<img src="Images/cookie.jpg" width="400" height="250" alt="Cookie" style="float:right;"/>
					<iframe width="400" height="212" src="https://www.youtube.com/embed/L6RKP80eqd0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<p>How to Decorate Star Wars Cookies - Become a Baking Rockstar</p>
				</article>
			</section>
		<footer>
			Sponsorised by Emperor Palpatine
		</footer>
	</body>
</html>