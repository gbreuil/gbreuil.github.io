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
					<p>
					A Website created with LAMP-server (Linux/Apache/MySQL/PHP)<br/>
					By Guillaume Breuil BTSSN2<br/><br/>
					
					Images are not own by me, all credits to their creator<br/>
					I got button UI (User Interface) by Crosscode Game<br/>
					I took photos with direct links from Google Image<br/><br/>
					I found the Youtube video on MyRecipe Channel and inserted the video with an Iframe tag 
					Finally i used a recipe from the site <br/><br/> <a href="https://www.tous-les-heros.com/fr/blog/cookies-chewbacca/" style="background-image:none; color:yellow;">https://www.tous-les-heros.com/fr/blog/cookies-chewbacca/</a>
					</p>
				</article>
			</section>
		<footer>
			Sponsorised by Emperor Palpatine
		</footer>
	</body>
</html>