<?php
session_start();
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8" /> 
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="css/stylePC.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="css/stylePort.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="css/impression.css" media="print">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="icon" href="image/Logo_ASIMOV.png" />
		
		<!-- Affiche un titre different suivant l'utilisateur co ou non -->
		<?php
		if( isset($_SESSION["utilisateur"]))
			echo "<title>Bonjour " . $_SESSION["utilisateur"] . "</title>\n";
		else
			echo "<title>Bienvenu chez A.S.I.M.O.V.</title>\n";
		?>
	</head>
	<body>
		
		<!-- Header est different suivant utilisateur co ou non -->
		<?php 
		include('php/include_header.php');
		?>
		
		<!-- Contenu de la page -->
		<div class="Conteneur_blocs">
				
			<!-- Section de présentation de L'assoiation -->
			<div class="bloc">
				<div class="sous_bloc">
					<h2>Présentation</h2>
					<p>L'assosiation ASIMOV (Association des Super Informaticiens du Mans Officieusement Vitamine) permet l'organisation de rencontre avec d'anciens étudiants du département Informatique en vue de faciliter de recherche d'emplois ou de stages en entreprise. </p>
					<p>Nous organisons des tournois de jeux tel que League of Legends. </p>
					<p>Une caféteria est mise a disposition au rez de chaussé de <a href="https://www.google.fr/maps/place/Institut+d'Informatique+Claude+Chappe/" target="_blank"> l'institut Claude Chappe.</a><br />La carte membre donne des avantages au Subway et a la caféteria.</p>
					<p>Pour toutes questions, vous pouvez prendre <a href="contact.php">contact</a> avec un membre de l'association.</p>
				<img class="image image_paragraphe" src="image/Logo_ASIMOV.png" alt="Logo de l'assosiation" />
				</div>
			</div>
			
			
		<!-- Membre -->
			<div class="bloc">
				<div class="sous_bloc">
					<h2>Pour devenir membre</h2>
					<p>Pour 5€, la carte de membre vous donne des avantages au Subway et a la caféteria.<br />Les inscriptions se font à la cafétéria de bâtiment informatique.</p>
					<p>Les réductions à la caféteria sont listées dans le tableau ci-dessous :</p>
				</div>
	
		<!-- Avantages -->
				<div class="sous_bloc">
					<h3>Prix de la caféteria</h3>
					<!-- Tableau des prix de la cafeteria -->
					<table class="table_prix">
						<tr>
							<td>Produit</td>
							<td>Prix Adhérant</td>
							<td>Prix Non Adhérant</td>
						</tr>
						<tr>
							<td>Repas (New)*</td>
							<td>3€</td>
							<td>3€</td>
						</tr>

						<tr>
							<td>Soda*</td>
							<td>0,6€</td>
							<td>0,8€</td>
						</tr>

						<tr>
							<td>Snack 1*</td>
							<td>0,6€</td>
							<td>1€</td>
						</tr>

						<tr>
							<td>Snack 2*</td>
							<td>0,7€</td>
							<td>1,1€</td>
						</tr>

						<tr>
							<td>Thé</td>
							<td>0,3€</td>
							<td>0,6€</td>
						</tr>

						<tr>
							<td>Café*</td>
							<td>0,5€</td>
							<td>0,6€</td>
						</tr>

						<tr>
							<td>Chupa Chups</td>
							<td>0,2€</td>
							<td>0,3€</td>
						</tr>
					</table>
				</div>
			</div>
				
		</div>
		
		<?php include('php/include_footer.php'); ?>
		
		
	</body>
</html>
