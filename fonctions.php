<?php

function afficheFormulaireConnexion()
{
	// affiche le formulaire de connexion
	echo '<form method="post" action="indexTraitement.php">';
	echo '<p>Identification<p>';
	echo '<p>Login :</p><input type="text" name="login" />';
	echo '<p>Password :</p><input type="password" name="password" /><br/><br/>';
	echo '<input type="submit" value="Connect" name="submit" class="button" />';
	echo '</form>';
}

function afficheTableauHTML($tab)
{
	foreach($tab as $v1)
	{
		echo '<tr>';
		foreach($v1 as $key => $v2)
		{
			if ($key != "mdp") 
			{
				echo '<td>';
				if ($key == "photo") 
				{
					echo '<img src="'.$v2.'"/>';
				}
				else if ($key == "cookie") 
				{
					echo '<img src="'.$v2.'"/>';
				}
				else
				{
					echo $v2;
				}
				echo '</td>';
			}
		}
		
		echo '</tr>';
	}
}

function afficheMenuMembre()
{
	echo"<ul><li><a href='ListerMembres.php' title='Lister'>List members</a></li></ul>";
	echo'<div class="button"><p><a href="./fermer_session.php">Disconnect</a></p></div>';
}

function afficheMenuAdmin()
{
	echo"<ul><li><a href='index.php' title='Index'>Homepage</a></li></ul>";
	echo"<ul><li><a href='ListerMembresAdmin.php' title='Lister'>List members</a></li></ul>";
	echo"<ul><li><a href='InscrireMembre.php' title='Ajouter'>Register a member</a></li></ul>";
	echo"<ul><li><a href='ModifierMembre.php' title='Modifier'>Modify a member</a></li></ul>";
	echo"<ul><li><a href='SupprimerMembre.php' title='Supprimer'>Delete a member</a></li></ul>";
	echo'<div class="button"><p><a href="./fermer_session.php">Disconnect</a></p></div>';
}

function listeMembres()
{
	try
	{
		$connBD = new PDO('sqlite:membres.sqlite');
		$req = "SELECT * FROM `membres`";
		$results = $connBD->query($req);
		if($results)
		{
			$tab=$results->fetchAll(PDO::FETCH_ASSOC);
			return $tab;
		}
		else{
			echo "Error while getting list of members";
		}
	}
	catch(PDOException $e)
	{
		echo "Connexion failed:".$e->getMessage().'<br/>';
	}
}

function afficheFormulaireAjoutMembre()
{
	echo "<form action='InscrireMembre.php' method='post'>
			<h1>Sign up a new member with the form</h1>
			</br>
			<center>Member Name :<input type='text' name='membre' size='40' /></center>

			</br></br>
			<center>Password :<input type='password' name='mdp' size='40' /></center>
			
			</br></br>
			<center>E-mail :<input type='text' name='mail' size='40' /></center>

			</br></br>
			<center>Photo :<input type='text' name='photo' size='40' /></center>
			
			</br></br>
			<center>Brand of favorite cookie :<input type='text' name='cookie' size='40' /></center>
			
			</br></br>
			<center>Bright/Dark side of the Force:
			<input type= 'radio' name='force' id='Bright' value='Bright' checked>Bright
			<input type= 'radio' name='force' id='Dark' value='Dark'>Dark
			</center>

			</br></br>
			<center><div class='button'><input type='submit' value='Register' name='submit' size='20' /></div></center>
			</br></br>
			
		</form>";

	$membre = !empty($_POST['membre']) ? $_POST['membre'] : NULL;
	$mdp = !empty($_POST['mdp']) ? $_POST['mdp'] : NULL;
	$mail = !empty($_POST['mail']) ? $_POST['mail'] : NULL;
	$photo = !empty($_POST['photo']) ? $_POST['photo'] : NULL;
	$cookie = !empty($_POST['cookie']) ? $_POST['cookie'] : NULL;
	$force = !empty($_POST['force']) ? $_POST['force'] : NULL;
	$submit = !empty($_POST['submit']) ? $_POST['submit'] : NULL;
	
	if(!empty($submit))
	{
		if(!empty($membre) && !empty($mdp) && !empty($mail) && !empty($force))
		{	
			/*if(isLoginUsed($membre) == "true")
			{
				echo "<p>Name is already used</p>";
				return 0;
			}*/
			if(empty($photo))
			{
				$photo='Images/stormtrooper.png';
			}
			if(empty($cookie))
			{
				$cookie='Images/cookiedupauvre.jpg';
			}
			ajoutMembre($membre,$mdp,$mail,$photo,$cookie,$force);
			echo "<p>To get back to the sign up form <a href='InscrireMembre.php'>Click Here !</a></p>";
		}
		else if(empty($membre) || empty($mdp) || empty($mail) || empty($force))
		{
			echo "<p>Please sign-up the form with all text information and images if wanted</p>";
		}
		else{
			echo "<p>Error while sign in up</p>";
		}
	}
}

/*function isLoginUsed($membre)
{
	var_dump($membre);
	$connBD = new PDO("sqlite:membres.sqlite");
	$req = "SELECT * FROM membres WHERE membre = '$membre'";
	$results = $connBD->query($req);
	var_dump($results);
}*/

function ajoutMembre($membre,$mdp,$mail,$photo,$cookie,$force)
{
	try{
		$connBD = new PDO('sqlite:membres.sqlite');
		$req = "INSERT INTO `membres` (`membre`,`mdp`,`mail`,`photo`,`cookie`,`force`) VALUES ('".$membre."', '".$mdp."', '".$mail."', '".$photo."', '".$cookie."', '".$force."')";
		$create = $connBD->exec($req) or die($connBD->errorInfo()[2]);
		if($create)
		{
			$req = "SELECT * FROM `membres`";
			$results = $connBD->query($req);
			if($results)
			{
				$tab=$results->fetchAll(PDO::FETCH_ASSOC);
				echo "Member inscription is a success !";
			}
			else
			{
				echo "Error to get member list";
			}
		}
		else
		{
			echo "Error to add the member";
		}
	}
	catch( PDOEXception $e ) {


           echo $e->getMessage(); // display error
           exit();
    }
}

function afficheFormulaireSupprimerMembre()
{
	echo "<form method='post' action='SupprimerMembre.php'>
			<p>What's the name of the member you want to delete ?</p>
			<br/>
			<input type='text' name='membre' />
			<br/><br/><div class='button'><input type='submit' value='Envoyer' name='submit' /></div>
		</form>";
	
	$membre = !empty($_POST['membre']) ? $_POST['membre'] : NULL;
	$submit = !empty($_POST['submit']) ? $_POST['submit'] : NULL;
	if(!empty($submit))
	{
		if(!empty($membre))
		{
			supprimerMembre($membre);
			echo "<br><p><div class='button'><a href='SupprimerMembre.php'>Return back</a></div></p>";
		}
		else
		{
			echo "<p>Please entry a name</p>";
		}
	}
}
function supprimerMembre($membre)
{
	$connBD = new PDO("sqlite:membres.sqlite");
	$delete= $connBD->exec("DELETE FROM `membres` WHERE `membre`='".$membre."';");
	if($delete)
	{
		$req = "SELECT * FROM membres";
		$results = $connBD->query($req);
		if($results)
		{
			$tab=$results->fetchAll(PDO::FETCH_ASSOC);
			echo "<p>The delete is a success !</p>";
		}
		else
		{
			echo "<p>Error to get the list of members</p>";
		}
	}
	else
	{
		echo "<p>Error while deleting the member</p>";
	}
}

function afficheFormulaireModifierMembre()
{
	echo "<form action='ModifierMembre.php' method='post'>
			<h1>Please submit your member modifications in the form</h1>
			</br>
			<center>Member Name<strong class='star'>*</strong> :<input type='text' name='membre' size='40' /></center>
			<p id='needed'>(Needed)</p>
			
			<center>Password :<input type='password' name='mdp' size='40' /></center>
			
			</br></br>
			<center>E-mail :<input type='text' name='mail' size='40' /></center>

			</br></br>
			<center>Photo :<input type='text' name='photo' size='40' /></center>
			
			</br></br>
			<center>Brand of favorite cookie :<input type='text' name='cookie' size='40' /></center>
			
			</br></br>
			<center>Bright/Dark side of the Force:
			<input type= 'radio' name='force' id='Bright' value='Bright'>Bright
			<input type= 'radio' name='force' id='Dark' value='Dark'>Dark
			</center>

			</br></br>
			<center><div class='button'><input type='submit' value='Register' name='submit' size='20' /></div></center>
			</br></br>
			
		</form>";
		
	$membre = !empty($_POST['membre']) ? $_POST['membre'] : NULL;
	$mdp = !empty($_POST['mdp']) ? $_POST['mdp'] : NULL;
	$mail = !empty($_POST['mail']) ? $_POST['mail'] : NULL;
	$photo = !empty($_POST['photo']) ? $_POST['photo'] : NULL;
	$cookie = !empty($_POST['cookie']) ? $_POST['cookie'] : NULL;
	$force = !empty($_POST['force']) ? $_POST['force'] : NULL;
	$submit = !empty($_POST['submit']) ? $_POST['submit'] : NULL;
	
	if(!empty($submit))
	{
		if(empty($membre) && empty($mdp) && empty($mail) && empty($force) && empty($photo) && empty($cookie))
		{
			echo "<p>Please fill at least one information to edit the member</p>";
		}
		else if(empty($membre))
		{
			echo "<p>Please fill the name of the member</p>";
		}
		else
		{	
			modifierMembre($membre,$mdp,$mail,$photo,$cookie,$force);
			echo "<p>The member got an update !</p>";
			echo "<p>To get back to the edit form <a href='InscrireMembre.php'>Click Here !</a></p>";
		}
	}
}

function modifierMembre($membre,$mdp,$mail,$photo,$cookie,$force)
{
	try{
		$connBD = new PDO("sqlite:membres.sqlite");
		
		$infos = array($mdp,$mail,$photo,$cookie,$force);
		$column = array("mdp","mail","photo","cookie","force");
		for($i = 0; $i < 5 ; $i++)
		{
			var_dump($infos[$i]);
			if(!empty($infos[$i]))
			{	
				$req = "UPDATE `membres` 
						SET ".$column[$i]." = '".$infos[$i]."' WHERE membre='".$membre."'";
				$connBD->exec($req);
			}
		}
	}
	catch(Exception $e) 
	{
		echo 'Exception -> ';
		var_dump($e->getMessage());
	}
}
?>