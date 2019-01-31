<?php
if( isset($_SESSION["utilisateur"]) )
{
?>
<div class="contenair_header">
	<!-- header -->
	<header>
		
		<!-- Menu PC -->
		<div class="name">
			<h1>
				<a href="index.php" class="text_menu">
					<img class="image image_header" src="image/Logo_ASIMOV.png" alt="logo asimov"/>A.S.I.M.O.V.
				</a>
			</h1>
		</div>
		
		<nav class="menuPC">
			<a href="forum.php" class="text_menu">Forum</a>
			<a href="profil.php" class="text_menu">Profil</a>
			<a href="php/deconnexion.php" class="text_menu">Déconnexion</a>
		</nav>

		<!-- Menu Portable -->
		<nav class="menuPort">
			<div  class="button">&equiv;</div>
			<div class="sous_menu">
				<a href="index.php" class="text_menuPort">Accueil A.S.I.M.O.V.</a>
				<a href="forum.php" class="text_menuPort">Forum</a>
				<a href="php/deconnexion.php" class="text_menuPort">Déconnexion</a>
			</div>
		</nav>
	</header>
	<div class="line"></div>
</div>
<?php
}
else
{
?>
<div class="contenair_header">
	<!-- header -->
	<header>
		
		<!-- Menu PC -->
		<div class="name">
			<h1>
				<a href="index.php" class="text_menu">
					<img class="image image_header" src="image/Logo_ASIMOV.png" alt="logo asimov"/>A.S.I.M.O.V.
				</a>
			</h1>
		</div>
		
		<nav class="menuPC">
			<a href="forum.php" class="text_menu">Forum</a>
			<a href="inscription.php" class="text_menu">S'inscrire</a>
			<a href="connexion.php" class="text_menu">Connexion</a>
		</nav>



		<!-- Menu Portable -->
		<nav class="menuPort">
			<div  class="button">&equiv;</div>
			<div class="sous_menu">
				<a href="index.php" class="text_menuPort">A.S.I.M.O.V.</a>
				<a href="forum.php" class="text_menuPort">Forum</a>
				<a href="inscription.php" class="text_menuPort">S'inscrire</a>
				<a href="connexion.php" class="text_menuPort">Connexion</a>
			</div>
		</nav>
	</header>
	
	<div class="line"></div>
</div>
<?php
}
?>
