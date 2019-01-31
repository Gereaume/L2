<?php
session_start();

if(isset($_POST["valider"]))
{
	if(isset ($_POST["login"]) && isset ($_POST["pwd"]) && isset ($_POST["c_pwd"]) && isset ($_POST["mail"]))
	{
		if($_POST["login"] != $_POST["pwd"])
		{
			if ($_POST["pwd"] == $_POST["c_pwd"])
			{
				if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']))
				{
					$Login = htmlentities($_POST ["login"]);
					$Pass = htmlentities($_POST ["pwd"]);

					$Server = "localhost";
					$User = "root";
					$Pwd = "";
					$DB = "ASIMOV";

					$Connect = mysqli_connect($Server, $User, $Pwd, $DB);

					if(!$Connect)
						echo  "connexion impossible";

					else
					{
						$Req = mysqli_query($Connect, 'SELECT login FROM utilisateur WHERE login = "'.$Login.'"');

						if(mysqli_num_rows($Req) == 1)
							echo "Login non disponible";
						else
						{
							$Req = mysqli_query($Connect, 'SELECT mail FROM utilisateur WHERE mail = "'.$_POST["mail"].'"');

							if(mysqli_num_rows($Req) == 1)
								echo "mail non disponible";
							else
							{
								$Req = mysqli_query($Connect, 'INSERT INTO utilisateur (login,mdp,mail) VALUES ( "'.$Login.'", "'.$Pass.'", "'.$_POST["mail"].'" )');
								
								$_SESSION['utilisateur'] = $Login;
								header('Location: ../index.php');
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
