<?php 

//const BASE_PATH = '../';
//include '../core/autoloader.php';
include '../Models/Visiteur.php';
include '../controllers/Crud.php';
include '../controllers/DataBase.php';

$afficheHeure = new Visiteur();
$listeHoraire = $afficheHeure->selectAllHoraire();

const IMAGE_PATH_SERVICE = '../admin/app/traitement/service/images/';

$afficheService = new Visiteur();
$listeService = $afficheHeure->selectAllService();


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
	<title>GARAGE V. PARROT | ACCUEIL</title>
</head>
<body>
	<div id="main">
		<header>
			<nav>
				<a href="#"><img src="assets/img/2.png" width="100" height="60"></a>
				<ul>
					<li><a href="index.php" class="active">ACCUEIL</a></li>
					<li><a href="galerie.php">GALERIE</a></li>
					<li><a href="../admin/">COMPTE</a></li>
					<li><a href="contact.php">CONTACTS</a></li>
				</ul>
			</nav>
			<div class="">
				<img src="#" class="banniere" width="2000" height="600">
			</div>
			<section class="text">
				<p class="text-transition"><span>"&nbsp;</span>Bienvenue chez V. PARROT, le garage de proximité.<span>&nbsp;"</span></p>
			</section>
		</header>
		<section id="services-p">
			<?php  foreach ($listeService as $service) 
			{
			?>
			<div class="one">
				<img src="<?php echo IMAGE_PATH_SERVICE.$service['image'] ?> " width="70" height="70">
				<h4><?php echo $service['titre'] ?></h4>
				<p><?php  echo $service['contenu']; ?></p>
			</div>
			<?php
			}
		 	?>
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

		<?php include 'footer.php' ?>
	</div>
</body>
</html>