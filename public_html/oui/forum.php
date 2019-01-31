<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>     
    	<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/stylePC.css" />
		<link rel="stylesheet" type="text/css" href="css/stylePort.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="icon" href="image/Logo_ASIMOV.png">
		
		<title> Forum ASIMOV </title>
	</head>

	<body>
		
		<?php include('php/include_header.php'); ?>
		
		<div class="Conteneur_blocs">			
			<?php
			/* affiche les derniers billets */
			include('php/include_afficher_billets.php');

			/* Si l'utilisateur n'est pas co, demande de se co pour pouvoir poster un billet */
			if(!isset($_SESSION["utilisateur"])) {
			?>
			<div class="bloc">
				<h4>Connectez-vous pour pouvoir poster un billet !</h4>
				<p><a href="connexion.php">Se connecter</a></p>
			</div>
			<?php
			} else {
			?>
				<!-- Cadre de commentation -->
			<div class="bloc">
				<h2>Poster un billet</h2>
				<form method="post" action = "php/poster_billet.php">
					<input type="text" name="titre" placeholder="Titre">
					<textarea class='text_contact' name="billet" rows="15" cols="100" ></textarea> <br />
					<input class="submit" type="submit" value= "valider" name ="valider"/>
				</form>
			</div>
			<?php
			}
			?>
		</div>
		<?php include("php/include_footer.php"); ?>
	</body>
</html>
						
					
						
					
						
		
