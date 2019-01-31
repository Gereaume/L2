<?php
session_start();

if( isset($_SESSION["admin"]) )
{
	$comm = (int)$_GET["comm"];
	
	$Server = "localhost";
	$User = "root";
	$Pwd = "";
	$DB = "ASIMOV";

	$Connect = mysqli_connect($Server, $User, $Pwd, $DB);

	if( $Connect )
	{
		$req = mysqli_query($Connect, 'SELECT id_billet FROM commentaires WHERE id='.$comm);
		
		if( mysqli_num_rows($req) == 1 )
		{
			$billet = mysqli_fetch_row($req);
			mysqli_query($Connect, 'DELETE FROM commentaires WHERE id='.$comm);
		}
	}
}
header("Location: ../commentaire.php?billet=" . $billet[0]);
?>
