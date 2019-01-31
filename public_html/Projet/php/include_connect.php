<?php
if(isset($_POST["valider"]))
{
	// on vérifie que les champs login et pseudo soient remplis
	if(isset($_POST["login"]) && isset($_POST["pwd"]))
	{ 
		$Login = htmlentities($_POST ["login"]);
		$Pass = htmlentities($_POST ["pwd"]);
		
		$Server = "localhost";
		$User = "root";
		$Pwd = "";
		$DB = "TI_RICHER_utilisateur";

		$Connect = mysqli_connect($Server, $User, $Pwd, $DB);
		
		if(!$Connect)
		{
			echo  "Connexion à la base de données impossible";
		}
		
		else
		{
			//requête dans la base de données pour rechercher si ces données existent et correspondent
			$Req = mysqli_query($Connect, 'SELECT login,Admin FROM utilisateur WHERE login = "'.$Login.'" AND mdp = "'. $Pass.'"');
			
			// si il y a un résultat, mysqli_num_rows() nous donnera alors 1
			if(mysqli_num_rows($Req) == 1)
			{
				$res = mysqli_fetch_row($Req);
				$_SESSION['utilisateur'] = $Login;
				if( $res[1] != NULL )
					$_SESSION["admin"] = 1;
				header("Location: index.php");
			}
			else
			{
				echo "Login ou mot de passe incorrect";
			}
		}
	}
}
?>
