<?php
session_start();
?>

<!DOCTYPE html>

<html>
	<head>     
    	<meta charset="UTF-8">		
		<title> Connexion </title>
	</head>
	
	<body>
	
		
		<div class="Conteneur_blocs">
				
			<!-- Cadre de connexion -->
			<div class="bloc">
				
				<h2>Connexion</h2>
				<p>Entrez vos identifiants de connexion</p>
				<form method="post" action = "connexion.php">
					<input class = "input" type = "text" name = "pseudo_user" placeholder= "pseudo" /> <br /> <br />
					<input class = "input" type = "password" name = "mdp_user" placeholder= "mdp"/> <br /> <br />
			
					<input class="submit" type="submit" value= "valider" name ="valider"/>
				</form>
				
				<?php
				include("include_connect.php");
				?>
				
			</div>
			
		</div>
		
	</body>

</html>
