<?php
session_start();

if(isset($_POST["valider"]))
{
	if(isset ($_POST["pseudo_user"]) && isset ($_POST["mdp_user"]) && isset ($_POST["c_mdp_user"]) && isset ($_POST["mail"]))
	{
		if($_POST["pseudo_user"] != $_POST["mdp_user"])
		{
			if ($_POST["mdp_user"] == $_POST["c_mdp_user"])
			{
				if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail_user']))
				{
					$pseudo_user = htmlentities($_POST ["pseudo_user"]);
					$mdp_user = htmlentities($_POST ["mdp_user"]);
					$nom_user = htmlentities($_POST ["nom_user"]);
					$prenom_user = htmlentities($_POST ["prenom_user"]);

					  $Server="info.univ-lemans.fr";
 					  $User="l2infoetu";
  					  $Pwd="webdyn72";
					  $DB="l2info";
					$Connect = mysqli_connect($Server, $User, $Pwd, $DB);

					if(!$Connect)
						echo  "connexion impossible";

					else
					{
						$Req = mysqli_query($Connect, 'SELECT pseudo_user FROM TI_RICHER_utilisateur WHERE login = "'.$Login.'"');

						if(mysqli_num_rows($Req) == 1)
							echo "Login indisponible";
						else
						{
							$Req = mysqli_query($Connect, 'SELECT mail_user FROM TI_RICHER_utilisateur WHERE mail = "'.$_POST["mail_user"].'"');

							if(mysqli_num_rows($Req) == 1)
								echo "mail indisponible";
							else
							{
								$Req = mysqli_query($Connect, 'INSERT INTO TI_RICHER_utilisateur (id_user,nom_user,prenom_user,pseudo_user,mdp_user,mail_user) VALUES (default,"'$nom_user.'","'$prenom_user.'","'.$pseudo_user.'", "'.$mdp_user.'", "'.$_POST["mail"].'" )');
								
								$_SESSION['utilisateur'] = $Login;
							}
						}
					}
				}
				else
					echo "adresse mail non valide";
			}
			else 
				echo "les mots de passes sont différents";
		}
		else
			echo "le login et le mot de passe doivent être différents";
	} 
}
