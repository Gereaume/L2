<?php
session_start();

if(isset($_POST["valider"]))
{
/* Si le billet ou le titre est vide, affiche un message */
	if( !empty($_POST["billet"]) && !empty($_POST["titre"]) )
	{
		$Server = "localhost";
		$User = "root";
		$Pwd = "";
		$DB = "ASIMOV";

		$Connect = mysqli_connect($Server, $User, $Pwd, $DB);
		
		if($Connect)
		{
			$req = mysqli_query($Connect, 'INSERT INTO billets (auteur,titre,contenu) VALUES ("'.$_SESSION["utilisateur"].'","'.htmlspecialchars($_POST["titre"]).'","'.nl2br(htmlspecialchars($_POST["billet"])).'")');
			header("Location: ../forum.php");
		}
			
	}
}
?>
