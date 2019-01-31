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
		
		<title> Exprimez-vous ! </title>
	</head>
	
	<body>
		
		<?php include('php/include_header.php'); ?>
		
		<div class="Conteneur_blocs">
			
			<?php
			include("php/include_afficher_commentaires.php");
			
			/* Si l'utilisateur n'est pas co, demande de se connecter pour pouvoir commenter */
			if( !isset($_SESSION["utilisateur"]) ) {
			?>
			<div class="bloc">
				<h4>Connectez-vous pour pouvoir commenter !</h4>
				<p><a href="connexion.php">Se connecter</a></p>
			</div>
			<?php
			} else {
			?>
			<!-- Cadre de commentation -->
			<div class="bloc">
				<h2>Laisser un commentaire</h2>
				<form method="post" action = "php/poster_commentaire.php?billet=<?php echo $_GET["billet"] ?>">
					<textarea class="text_contact" name="commentaire" rows="10" cols="100" ></textarea> <br />
					<input class="submit" type="submit" value= "valider" name ="valider_com"/>
				</form>
			</div>
			<?php
			}
			include("php/include_footer.php");
			?>
		</div>
		
	</body>
</html>
					
