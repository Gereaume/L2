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
		
		<title> Inscription </title>
	</head>
	
	<body>
		
		<?php include('php/include_header.php'); ?>
		
		<div class="Conteneur_blocs">
				
			<div class="bloc">
				<!-- Cadre inscription -->
				<h2>Inscription</h2>
				<p>Entrez vos informations personnelles</p>
				<form method="post" action = "php/inscrire.php">
					<input class = "input" type = "text" name = "login" placeholder= "Login" /> <br /> <br />
					<input class = "input" type = "password" name = "pwd" placeholder= "Password"/>
					<input class = "input" type = "password" name = "c_pwd" placeholder= "confirmer"/> <br /> <br />
					<input class = "input" name = "mail" placeholder= "adresse mail"/> 
					<input class = "input" name = "c_mail" placeholder= "confimer"/> <br /> <br />
					<input class="submit" type="submit" value= "valider" name ="valider"/>
				</form>
			</div>
					
		</div>
		
		<?php include('php/include_footer.php'); ?>
		
	</body>
</html>
