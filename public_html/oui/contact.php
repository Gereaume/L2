<?php
session_start();
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8" /> 
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="css/stylePC.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="css/stylePort.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="css/impression.css" media="print">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="icon" href="image/Logo_ASIMOV.png" />
		
		<!-- Affiche un titre different suivant l'utilisateur co ou non -->
		<?php
		if( isset($_SESSION["utilisateur"]))
			echo "<title>Bonjour " . $_SESSION["utilisateur"] . "</title>\n";
		else
			echo "<title>Contact</title>\n";
		?>
	</head>

	<body>
	<!-- Header est different suivant utilisateur co ou non -->
		<?php 
		include('php/include_header.php');
		?>
		
		<!-- Contenu de la page -->
		<div class="Conteneur_blocs">
			
			<div class="bloc">
				<h2>Contact</h2>
				<p>Contactez le resposable de l'association a l'adresse example@example.com<br /> ou via le formulaire ci-dessous</p>
				<form method="post" action="php/contact.php">
					<input class="input" type="text" name="nom" 	placeholder="Nom :" />
					<input class="input" type="text" name="prenom" 	placeholder="Prenom :" />
					<input class="input" type="text" name="email" 	placeholder="Email :" />
					<textarea class="text_contact" placeholder="Votre texte ici :" name="message" rows="5" cols="90"></textarea>
					<input class="submit" type="submit" name="valider" />
				</form>
	
			</div>
				
		</div>
							
		<?php include('php/include_footer.php'); ?>
			
	</body>
</html>
		
