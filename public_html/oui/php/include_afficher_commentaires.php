<?php
$Server = "localhost";
$User = "root";
$Pwd = "";
$DB = "ASIMOV";

$Connect = mysqli_connect($Server, $User, $Pwd, $DB);

/* Si les parametre billet est vide */
if( empty($_GET["billet"]) )
{
	header("Location: forum.php");
}
	$id = (int)$_GET['billet'];

if($Connect)
{
/* Affiche le billet en question */
	$req = mysqli_query($Connect,'SELECT titre,auteur,date,contenu,id FROM billets WHERE id = "' . $id . '"');
	
	if( mysqli_num_rows($req) < 1 )
	{
		header("Location: forum.php");
	}
	else
	{
		$donnee = mysqli_fetch_row($req);
		?>
		<div class="billet">
			<?php
			if( isset($_SESSION["admin"]) && $_SESSION["admin"] == 1 )
				echo '<p><a class="lien_suppression" href="php/supprimer_billet.php?billet='.$donnee[4].'">Supprimer</a></p>';
			?>
			<h2> <?php echo $donnee[0]; ?> </h2>
			<h4> <?php echo "par " . $donnee[1] . " le " . $donnee[2]; ?> </h4>
			<hr />
			<p> <?php echo $donnee[3]; ?> </p>
		</div>

		<?php
		
		
/* Affiche les commentaires du billet */
		$req = mysqli_query($Connect, 'SELECT auteur,date,commentaire,id FROM commentaires WHERE id_billet = "' . $id . '" ORDER BY date');

		if( mysqli_num_rows($req) == 0 )
		{
		?>
		<div class="bloc">
			<h4>Ce billet ne comporte pas de commentaire, soyez le premier à commenter !</h4>
		</div>
		<?php
		}
		else
		{
			?>
			<div class="billet"> 
			<?php
			while( $donnees = mysqli_fetch_row($req))
			{
			/* Affiche les commentaires de ce billet */
			?>
				<div class="commentaire">
					<?php
					if( isset($_SESSION["admin"]) && $_SESSION["admin"] == 1 )
						echo '<p><a class="lien_suppression" href="php/supprimer_commentaire.php?comm='.$donnees[3].'">Supprimer</a></p>';
					?>
					<h4> <?php echo $donnees[0]; ?> le <?php echo $donnees[1]; ?> </h4>
					<p> <?php echo $donnees[2]; ?> </p>
				</div>
			<?php
			}
			?>
			</div> 
			<?php
		}
	}
}
?>
