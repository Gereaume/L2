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
		
		<title> Connexion </title>
	</head>
	
	<body>
	
		<?php include('php/include_header.php'); ?>
		
		<div class="Conteneur_blocs">
				
			<!-- Cadre de connexion -->
			<div class="bloc">
				
				<h2>Connexion</h2>
				<p>Entrez vos identifiants de connexion</p>
				<form method="post" action = "connexion.php">
					<input class = "input" type = "text" name = "login" placeholder= "Login" /> <br /> <br />
					<input class = "input" type = "password" name = "pwd" placeholder= "Password"/> <br /> <br />
			
					<input class="submit" type="submit" value= "valider" name ="valider"/>
				</form>
				
				<?php
				include("php/include_connect.php");
				?>
				
			</div>
			
		</div>
		
		<?php include('php/include_footer.php'); ?>
		
	</body>

</html>
