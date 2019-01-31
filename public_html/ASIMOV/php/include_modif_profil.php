<?php
if(isset($_POST["valider_modif"]))
{
	$Server = "localhost";
	$User = "root";
	$Pwd = "";
	$DB = "ASIMOV";

	$Connect = mysqli_connect($Server, $User, $Pwd, $DB);
	
	if( !empty($_POST['login']) )
	{
		$Req = mysqli_query($Connect, 'SELECT login FROM utilisateur WHERE login = "'.$_POST['login'].'"');
			
		if(mysqli_num_rows($Req) == 1)
			echo "Login non disponible<br />";
		else
		{
			$Req = mysqli_query($Connect, 'UPDATE utilisateur SET login="'.htmlspecialchars($_POST["login"]).'" WHERE login="'.$_SESSION['utilisateur'].'"'); 
			echo "Login modifié avec succes, nouveau login : " . $_POST['login'] . "<br />";
			$_SESSION["utilisateur"] = htmlspecialchars($_POST["login"]);
		}
	}
	
	if( !empty($_POST['mdp']) && !empty($_POST['c_mdp']) )
	{
		$Req = mysqli_query($Connect, 'SELECT login FROM utilisateur WHERE mdp = "'.$_POST['mdp'].'"');
			
		if(mysqli_num_rows($Req) == 1)
			echo "Mot de passe non disponible<br />";	
		else
		{
			$Req = mysqli_query($Connect, 'UPDATE utilisateur SET mdp="'.$_POST["mdp"].'" WHERE login="'.$_SESSION['utilisateur'].'"'); 
			echo "Le mot de passe  a été modifié<br />";
		}
	}
	
	if( !empty($_POST['prenom']) )
	{
		$Req = mysqli_query($Connect, 'UPDATE utilisateur SET prenom="'.htmlspecialchars($_POST["prenom"]).'" WHERE login="'.$_SESSION['utilisateur'].'"'); 
		echo "Prenom ajouté : " . $_POST['prenom'] . "<br />";
	}
	
	if( !empty($_POST['nom']) )
	{
		$Req = mysqli_query($Connect, 'UPDATE utilisateur SET nom="'.htmlspecialchars($_POST["nom"]).'" WHERE login="'.$_SESSION['utilisateur'].'"'); 
		echo "Nom ajouté : " . $_POST['nom'] . "<br />";
	}
	
	if( !empty($_POST['mail']) )
	{
		if( preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']) )
		{
			$Req = mysqli_query($Connect, 'SELECT mail FROM utilisateur WHERE mail = "'.$_POST["mail"].'"');

			if(mysqli_num_rows($Req) == 1)
				echo "mail non disponible<br />";
			else
			{
				$Req = mysqli_query($Connect, 'UPDATE utilisateur SET mail="'.htmlspecialchars($_POST["mail"]).'" WHERE login="'.$_SESSION['utilisateur'].'"'); 
				echo "Le mail a été modifié : " . $_POST['mail'] . "<br />";
			}
		}
		else
			echo "Le format du mail est invalide<br />";
	}
	
	if( !empty($_POST['naissance']) )
	{
		$Req = mysqli_query($Connect, 'UPDATE utilisateur SET naissance="'.htmlspecialchars($_POST["naissance"]).'" WHERE login="'.$_SESSION['utilisateur'].'"'); 
		echo "La date de naissance a été modifiée : " . $_POST['naissance'] . "<br />";
	}
}
?>
