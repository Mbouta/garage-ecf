<?php 

const BASE_PATH = '../';
include '../core/autoloader.php';

// Récupération des SERVICES DE L'ACCUEIL
$afficheVoiture = new Visiteur();
$listeVoiture = $afficheVoiture->selectAllVoiture();


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicons -->
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="img/favicon_io/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon_io/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon_io/favicon-16x16.png">
	<link rel="manifest" href="img/favicon_io/site.webmanifest"> -->
    <!-- Favicons -->
    <!-- Font awesome -->
    <!-- <script src="https://kit.fontawesome.com/429431211c.js" crossorigin="anonymous"></script> -->
    <!-- Font awesome -->

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/galerie.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- Inclusion du CDN de Bootstrap (CSS) -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css">

	<title>GARAGE V. PARROT | COMMANDE VEHICULES</title>
</head>
<body>
	<div id="main">
		<header>
			<nav>
				<a href="#"><img src="assets/img/2.png" width="100" height="60"></a>
				<ul>
					<li><a href="index.php">ACCUEIL</a></li>
					<li><a href="#">SERVICES</a></li>
					<li><a href="galerie.php" class="active">GALERIE</a></li>
					<li><a href="admin/">COMPTE</a></li>
					<li><a href="contact.php">CONTACTS</a></li>
				</ul>
			</nav>
			<div class="">
				<img src="#" class="banniere" width="2000" height="300">
			</div><!-- 
			<section class="text">
				<p class="text-transition"><span>"&nbsp;</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit<span>&nbsp;"</span></p>
			</section> -->
		</header>

		<br>
		<form id="filtres-form">
			<label for="prix-min">Prix minimum :</label>
			<input type="number" id="prix-min" name="prix_min">

			<label for="prix-max">Prix maximum :</label>
			<input type="number" id="prix-max" name="prix_max">

			<!-- Ajoutez d'autres champs de filtrage selon vos besoins -->

			<button id="send" type="submit">Appliquer les filtres</button>
		</form>

		<section class="galerie">
		 <div id="resultats">

		 </div>
		</section>

		<section class="partenaires">
			<p class="text-partenaire">Ils travaillent avec nous</p>
			<div class="partenaires-logo">
				<img src="assets/img/parrot.png" width="200" height="200">
				<img src="assets/img/2.png" width="200" height="200">
				<img src="assets/img/parrot.png" width="200" height="200">
				<img src="assets/img/2.png" width="200" height="200">
			</div>
		</section>

		<div id="commentaire">
			<p>Sur 24493 avis clients, v-parrot.fr a obtenu la note de 4,6/5</p>
			<p><a href="commentaires.php">Voir tous les avis clients v-parrot.com</a><span>&nbsp;></span></p>
		</div>
		<footer>
			<div class="pages-site">
				<ul>
					<li>PAGES INTERNES</li>
					<li><a href="#">Accueil</a></li>
					<li><a href="#">Services</a></li>
					<li><a href="#">Galerie</a></li>
					<li><a href="#">Boutique</a></li>
					<li><a href="#">Administration</a></li>
					<li><a href="contact.php">Contacts</a></li>
				</ul>
			</div>
			<div class="services">
				<ul>
					<li>NOS SERVICES</li>
					<li><a href="#">Réparation</a></li>
					<li><a href="#">Entretien</a></li>
					<li><a href="#">Voiture d'occasion</a></li>
					<li><a href="#">Location</a></li>
					<li><a href="#">Lavage</a></li>
					<li><a href="#">Tuning</a></li>
				</ul>
			</div>
			<div class="horaires">
				<ul>
					<li>HEURES D'OUVERTURE</li>
					<li><a href="#">Lundi</a></li>
					<li><a href="#">Mardi</a></li>
					<li><a href="#">Mercredi</a></li>
					<li><a href="#">Jeudi</a></li>
					<li><a href="#">Vendredi</a></li>
					<li><a href="#">Samedi</a></li>
					<li><a href="#">Dimanche</a></li>
				</ul>
			</div>
			<div class="social">
				<ul>
					<li>RESEAUX SOCIAUX</li>
					<li><a href="#" target="_blank"><img width="48" height="48" src="https://img.icons8.com/color/48/facebook.png" alt="facebook"/></a></li>
					<li><a href="#" target="_blank"><img width="48" height="48" src="https://img.icons8.com/color/48/youtube-play.png" alt="youtube-play"/></a></li>
					<li><a href="#" target="_blank"><img width="48" height="48" src="https://img.icons8.com/color/48/tiktok--v1.png" alt="tiktok--v1"/></a></li>
				</ul>
			</div>
		</footer>

	<!-- Modal Contacter-->
	<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">Contacter</h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modalContact" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        ...
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
	        <button type="button" class="btn btn-primary">Enoyer</button>
	      </div>
	    </div>
	  </div>
	</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>

<script>
	$(document).ready(function() {

		loadDataVoiture("","")
		$('#send').click(function(event) {
			event.preventDefault()
			// Récupérer les valeurs des champs du formulaire
			var prixMin = $('#prix-min').val();
			var prixMax = $('#prix-max').val();
			loadDataVoiture(prixMin,prixMax)
		});

		function loadDataVoiture(prixMin,prixMax) {
			// Envoyer les données au fichier PHP en utilisant AJAX
			$.ajax({
				url: '../admin/app/traitement/visiteur/q_search.php',
				type: 'POST',
				data: { prix_min: prixMin, prix_max: prixMax },
				success: function(response){
					$('#resultats').empty();
					$('#resultats').prepend(response);
				},
				error: function() {
					console.log('Erreur lors de la requête AJAX');
				}
			});
		}
	});

</script>
 </body>
</html>