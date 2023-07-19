<?php 

//const BASE_PATH = '../';
//include '../core/autoloader.php';
include '../Models/Visiteur.php';
include '../controllers/Crud.php';
include '../controllers/DataBase.php';
// Récupération des SERVICES DE L'ACCUEIL
$afficheVoiture = new Visiteur();
$listeVoiture = $afficheVoiture->selectAllVoiture();

const IMAGE_PATH_VOITURE = '../admin/app/traitement/voiture/images/';


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon_io/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon_io/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon_io/favicon-16x16.png">
	<link rel="manifest" href="img/favicon_io/site.webmanifest">
    <!-- Favicons -->
    <!-- Font awesome -->
    <!-- <script src="https://kit.fontawesome.com/429431211c.js" crossorigin="anonymous"></script> -->
    <!-- Font awesome -->

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>GARAGE V. PARROT | DETAILS VEHICULES</title>
</head>
<body>
	<div id="main">
		<header>
			<nav>
				<a href="#"><img src="assets/img/2.png" width="100" height="60"></a>
				<ul>
					<li><a href="index.php">ACCUEIL</a></li>
					<li><a href="galerie.php" class="active">GALERIE</a></li>
					<li><a href="../admin/">COMPTE</a></li>
					<li><a href="contact.php">CONTACTS</a></li>
				</ul>
			</nav>
			<div class="">
				<img src="#" class="banniere" width="2000" height="300">
				
			</div>
		</header>
		<section class="details">
			<h2>PLUS D'INFOS</h2>
				<?php 
		        	$condition = [
		        		'id_voiture' => $_GET['id']
		        	];
		        	$afficheVoitureGalerie = $afficheVoiture->selectVoitureImage($condition);

		        	foreach ($afficheVoitureGalerie as $voitureGalerie) 
		        	{
		        	?>
		        		<img src="<?php echo IMAGE_PATH_VOITURE.$voitureGalerie['image']; ?> " width="300" height="300">
		        <?php
		        	}

		         ?>

				<div class="description">
					<h3>Marque: <?php echo $_GET['nom']; ?></h3>
					<h3>Prix: <?php  echo $_GET['prix']." <strong>euros</strong>"; ?></h3>
					<!-- Button trigger modal -->
				<p><?php  echo $_GET['caracteristiques']; ?></p>
				</div>
		</section>
			<p class="text-partenaire">Ils travaillent avec nous</p>
		<section class="partenaires">
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

		<?php include 'footer.php'; ?>
	
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>