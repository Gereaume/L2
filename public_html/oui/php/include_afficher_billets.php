<?php
$Server = "localhost";
$User = "root";
$Pwd = "";
$DB = "ASIMOV";

$Connect = mysqli_connect($Server, $User, $Pwd, $DB);

if( $Connect )
{
	/* Recupere les 5 derniers billets */
	$Req = mysqli_query($Connect, 'SELECT id,titre,auteur,date,contenu FROM billets ORDER BY id DESC LIMIT 0, 5');

	/* Affiche les billets */
	while($donnee = mysqli_fetch_row($Req) )
	{
	?>
	<div class="billet">
		<?php
		if( isset($_SESSION["admin"]) && $_SESSION["admin"] == 1 )
			echo '<p><a class="lien_suppression" href="php/supprimer_billet.php?billet='.$donnee[0].'">Supprimer</a></p>';
		?>
		<h2> <?php echo $donnee[1]; ?> </h2> <!-- htmlspecialchar() n'accepte pas d'afficher les messages avec des char speciaux ( 'é' par example)... -->
		<h4> <?php echo "par " . $donnee[2] . " le " . $donnee[3]; ?> </h4>
		<hr />
		<p> <?php echo $donnee[4]; ?> </p>
		<hr />
		<p><a class="lien_commentaire" href="commentaire.php?billet=<?php echo $donnee[0]; ?> ">Commentaires</a></p>
		
	</div>
	<?php
	}
}
?>
