<?php
session_start();

$Server = "localhost";
$User = "root";
$Pwd = "";
$DB = "ASIMOV";

$Connect = mysqli_connect($Server, $User, $Pwd, $DB);

if($Connect)
{
	$Req=mysqli_query($Connect, 'SELECT prenom, nom, mail, naissance FROM JK_EDEL_utilisateur WHERE login =' .$_SESSION["utilisateur"]);

	if(mysqli_num_rows($Req) == 1)
	{
		$donnees = mysqli_fetch_row($Req);
		
		if(!empty($donnees[0])
			$Prenom = $donnees[0];
		else
			$Prenom = "Prenom";

		if(!empty($donnees[1])
			$Nom = $donnees[1];
		else
			$Nom = "Nom";

		if(!empty($donnees[2])
			$Mail = $donnees[2];
		else
			$Mail = "Mail";
		
		if(!empty($donnees[3])
			$Naiss = $donnees[3];
		else
			$Naiss = "Naissance";

		

		
	}
}

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
		
		<?php
		if( isset($_SESSION["utilisateur"]) )
			echo "<title>" . $_SESSION["utilisateur"] . "</title>\n";
		else
			echo "<title>Connectez-vous</title>\n";
		?>
	</head>
	
	<body>
		
		<?php include('php/include_header.php'); ?>
		
		<div class="Conteneur_blocs">
		<?php
		if( !isset($_SESSION["utilisateur"]) )
		{
		?>
			<div class="bloc">
				<h4>Connectez-vous pour accéder à votre profil !</h4>
				<p><a href="connexion.php">Se connecter</a></p>
			</div>
		<?php
		}
		else
		{
		?>
			<!-- Cadre inscription -->
			<div class="bloc">
				<h2>Profil</h2>
				<p>Modifier vos informations personnelles</p>
					
				<form method="post" action = "profil.php">
					<input class="input" type="text" name="login" placeholder="<?php echo $_SESSION["utilisateur"]; ?>" /> <br />
					<input class="input" type="password" name="mdp" placeholder="Mot de passe" /> <br />
					<input class="input" type="password" name="cmdp" placeholder="Confirmé" /> <br />
					<input class="input" type="text" name="prenom" placeholder= "<?php echo $Prenom; ?>" /> <br />
					<input class="input" type="text" name="nom" placeholder="<?php echo $Nom; ?>"/> <br />
					<input class="input" type="text" name="mail" placeholder="<?php echo $Mail; ?>"/> <br />
					<input class="input" type="text" name="naissance" placeholder="<?php echo $Naiss; ?>"/> <br />
	
					<input class="submit" type="submit" value= "valider" name ="valider_modif"/>
				</form>
				<p><?php include("php/include_modif_profil.php"); ?></p>
			</div>
		<?php
		}
		?>
		
		</div>
		
		<?php include('php/include_footer.php'); ?>
		
	</body>
</html>
