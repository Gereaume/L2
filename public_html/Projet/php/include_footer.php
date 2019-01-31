<?php
if( isset($_SESSION["utilisateur"]) )
{
?>
<footer>
	<span>Site fictif pour un TP</span>
	<span>Créé par une bande de petits chenapans</span>
	
	<nav>
		<ul>
			<li> <a href="index.php">Accueil</a> </li>
			<li> <a href="contact.php">Contact</a> </li>
			<li> <a href="php/deconnexion.php">Déconnexion</a> </li>
			<li> <a href="forum.php">Forum</a> </li>
			<li> <a href="profil.php">Profil</a> </li>
		</ul>
	</nav>
	
	<div class="reseaux">
		<a href="https://www.facebook.com/assoAsimov" target="_blank" >
			<img class="image_reseaux" src="image/facebook.png" alt="fb"/></a>
		<a href="https://twitter.com" target="_blank" >
			<img class="image_reseaux" src="image/twitter.png" alt="tw"/></a>
	</div>
</footer>
<?php
} else {
?>
<footer>
	<span>Site fictif pour un TP</span>
	<span>Créé par une bande de petits chenapans</span>
	
	<nav>
		<ul>
			<li> <a href="contact.php">Contact</a> </li>
			<li> <a href="index.php">Accueil</a> </li>
			<li> <a href="inscription.php">Inscription</a> </li>
			<li> <a href="connexion.php">Connexion</a> </li>
			<li> <a href="forum.php">Forum</a> </li>
			<li> <a href="profil.php">Profil</a> </li>
		</ul>
	</nav>
	
	<div class="reseaux">
		<a href="https://www.facebook.com/assoAsimov" target="_blank" >
			<img class="image_reseaux" src="image/facebook.png" alt="fb"/></a>
		<a href="https://twitter.com" target="_blank" >
			<img class="image_reseaux" src="image/twitter.png" alt="tw"/></a>
	</div>
</footer>
<?php
}
?>
