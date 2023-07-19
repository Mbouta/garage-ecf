<?php 

//const BASE_PATH = '../';
//include '../core/autoloader.php';
include '../Models/Visiteur.php';
include '../controllers/Crud.php';
include '../controllers/DataBase.php';
$afficheHeure = new Visiteur();
$listeHoraire = $afficheHeure->selectAllHoraire();

// Récupération du message
	$message = '';
   	if (isset($_GET['message'])) {
   		$message = $_GET['message'];
   }
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
					<li><a href="index.php">ACCUEIL</a></li>
					<li><a href="galerie.php">GALERIE</a></li>
					<li><a href="../admin/" target="_blank">COMPTE</a></li>
					<li><a href="contact.php" class="active">CONTACTS</a></li>
				</ul>
			</nav>
			<div class="">
				<img src="#" class="banniere" width="2000" height="300">
			</div>
				<p class="nous-contacter">Nous Contacter</p>
		</header>
			<p style=""><?php echo $message ?></p>
		<section class="formulaire">
			<div>
				<p>Nos Contacts</p>
				<p>Adresse mail: contact@v-parrot.fr</p>
				<p>Téléphone: +33 xxx xxx xxx</p>
				<p>Bureau: xxx xxx xxxxx xxxx</p>
			</div>
			<form action="../admin/app/traitement/visiteur/createContact.php" method="POST">
				<input type="text" name="nom" placeholder="Nom" required><br>
				<input type="text" name="prenom" placeholder="Prénom" required><br>
				<input type="text" name="email" placeholder="Adresse mail" required><br>
				<input type="text" name="telephone" placeholder="Téléphone" required><br>
				<input type="text" name="sujet" placeholder="Sujet" required><br>
				<textarea name="message" placeholder="Laissez-nous un mot" cols="49">
				</textarea><br>
				<input type="submit" value="Envoyer"><br>
			</form>
		</section>
		
		<p class="text-partenaire">Ils travaillent avec nous</p>
		<section class="partenaires">
			<div class="partenaires-logo">
				<img src="assets/img/parrot.png" width="140" height="140">
				<img src="assets/img/2.png" width="140" height="140">
				<img src="assets/img/parrot.png" width="140" height="140">
				<img src="assets/img/2.png" width="140" height="140">
			</div>
		</section>
		<?php include 'footer.php'; ?>

	</div>
</body>
</html>