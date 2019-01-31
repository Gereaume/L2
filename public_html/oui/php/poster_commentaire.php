<?php
session_start();

if(isset($_POST["valider_com"]))
{
	if( !empty($_POST["commentaire"]) )
	{
		$Server = "localhost";
		$User = "root";
		$Pwd = "";
		$DB = "ASIMOV";

		$Connect = mysqli_connect($Server, $User, $Pwd, $DB);

		if( $Connect )
		{
			$req = mysqli_query($Connect, 'INSERT INTO commentaires (id_billet,auteur,commentaire) VALUES ("'.$_GET["billet"].'","'.$_SESSION["utilisateur"].'","'.nl2br(htmlspecialchars($_POST["commentaire"])).'")');
			header("Location: ../commentaire.php?billet=" . $_GET["billet"]);
		}
	}
}
?>
