<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>     
    	<meta charset="UTF-8">
		
		<title> Inscription </title>
	</head>
	
	<body>
		
		<div class="Conteneur_blocs">
				
			<div class="bloc">
				<!-- Cadre inscription -->
				<h2>Inscription</h2>
				<p>Entrez vos informations personnelles</p>
				<form method="post" action = "inscrire.php">
					<input class = "input" type = "text" name = "pseudo_user" placeholder= "Pseudo" /> <br /> <br />
					<input class = "input" type = "text" name = "nom_user" placeholder= "Nom" /> <br /> <br />
					<input class = "input" type = "text" name = "prenom_user" placeholder= "Prenom" /> <br /> <br />
					<input class = "input" type = "password" name = "mdp_user" placeholder= "Mot de Passe"/>
					<input class = "input" type = "password" name = "c_mdp_user" placeholder= "confirmer"/> <br /> <br />
					<input class = "input" name = "mail_user" placeholder= "adresse mail"/> 
					<input class = "input" name = "c_mail_user" placeholder= "confimer"/> <br /> <br />
					<input class="submit" type="submit" value= "valider" name ="valider"/>
				</form>
			</div>
					
		</div>
		
	</body>
</html>
