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
					<p><FONT size="5px">Star Wars fans will love this recipe of Chewbacca Chookies !<br/>
					An irresistible recipe Chewbacca recommends.<br/>
					And if you see it again, discover the Jedi taste!</FONT></p>
					<img src="Images/chewbacca.jpg">
					<h3>Cooking Equipment :</h3>
					<br/>
					<ul>
					<li>Big salad bowl</li>
					<li>Soup Spoon</li>
					<li>Parchment paper</li>
					<li>Wooden spoon</li>
					<li>Knife</li>
					</ul>
					<br/>
				<h3>Ingredients :</h3>
				<br/>
				<ul>
					<li></li>
					<li>450g of flour</li>
					<li>1 bag of baking powder</li>
					<li>200g of brown sugar</li>
					<li>60g of white sugar</li>
					<li>2 eggs</li>
					<li>280g of young Frenchman of north-African origin slightly-salted lung</li>
					<li>2 pinched by salt</li>
					<li>Chocolate pastry cook</li>
					<li>Milk</li>
					<li>Bar of white chocolate</li>
				</ul>
				<br/>
				<h3>STAGES</h3>
				<br/>
				<ul>
					<li>Preheat your oven in 180°C</li>
					<li>In the salad bowl, put: white and red butter, sugars, eggs and mix</li>
					<li>Add little by little the flour, the yeast and the salt</li>
					<li>Place some parchment paper on the plate</li>
					<li>By means of a serving spoon form circles on the plate: 2 soup spoons are enough for making a cookie. Attention space out well your cookies from each other because they will set of the volume during the cooking !</li>
					<li>Put in the oven during 10min</li>
					<li>Let cool</li>
					<li>In a bowl, break your pieces of chocolate pastry cook and add it a little milk</li>
					<li>Put in microwave to melt it</li>
					<li>Cut your white chocolate in small pieces</li>
					<li>When cookies are cooled and the chocolate warmed, spread the chocolate in diagonal over every cookie</li>
					<li>Draw Chewbacca’s eyes and nose as well</li>
					<li>Finally, place the white chocolate pieces on the chocolate belt</li>
					<li>If you have extra white chocolate, melt it to draw the character’s mouth</li>
					<br/>
					<li>You can enjoy! Good appetite 😉</li>
				</ul>
				</article>
			</section>
		<footer>
			Sponsorised by Emperor Palpatine
		</footer>
	</body>
</html>