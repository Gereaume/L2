<?php
session_start();

if( isset($_SESSION["admin"]) )
{
	$billet = (int)$_GET["billet"];
	
	$Server = "localhost";
	$User = "root";
	$Pwd = "";
	$DB = "ASIMOV";

	$Connect = mysqli_connect($Server, $User, $Pwd, $DB);

	if( $Connect )
	{
		$req = mysqli_query($Connect, 'SELECT * FROM billets WHERE id='.$billet);
		
		if( mysqli_num_rows($req) == 1 )
		{
			mysqli_query($Connect, 'DELETE FROM billets WHERE id='.$billet);
			mysqli_query($Connect, 'DELETE FROM commentaires WHERE id_billet='.$billet);
		}
			
	}
}
header("Location: ../forum.php");
?>
