<?php
if(isset($_POST["valider"]))
{
	// on vérifie que les champs login et pseudo soient remplis
	if(isset($_POST["pseudo_user"]) && isset($_POST["mdp_user"]))
	{ 
		$pseudo_user = htmlentities($_POST ["pseudo_user"]);
		$mdp_user = htmlentities($_POST ["mdp_user"]);
		
					  $Server="info.univ-lemans.fr";
 					  $User="l2infoetu";
  					  $Pwd="webdyn72";
					  $DB="l2info";
					$Connect = mysqli_connect($Server, $User, $Pwd, $DB);
		if(!$Connect)
		{
			echo  "Connexion à la base de données impossible";
		}
		
		else
		{
			//requête dans la base de données pour rechercher si ces données existent et correspondent
			$Req = mysqli_query($Connect, 'SELECT pseudo_user,Admin FROM TI_RICHER_utilisateur WHERE login = "'.$pseudo_user.'" AND mdp = "'. $mdp_user.'"');
			
			// si il y a un résultat, mysqli_num_rows() nous donnera alors 1
			if(mysqli_num_rows($Req) == 1)
			{
				$res = mysqli_fetch_row($Req);
				$_SESSION['utilisateur'] = $pseudo_user;
				if( $res[1] != NULL )
					$_SESSION["admin"] = 1;
			}
			else
			{
				echo "Login ou mot de passe incorrect";
			}
		}
	}
}
?>
