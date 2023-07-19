<?php 

//const BASE_PATH = '../';
//include '../core/autoloader.php';
include '../Models/Visiteur.php';
include '../controllers/Crud.php';
include '../controllers/DataBase.php';
// Récupération des COMMENTAIRES DE L'ACCUEIL
$afficheCommentaires = new Visiteur();

$listeCommentaires = $afficheCommentaires->selectValidateTemoignage();

// Insertion des CONTACTS
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
    <link rel="stylesheet" type="text/css" href="assets/css/galerie.css">
	<title>GARAGE V. PARROT | ESPACE COMMENTAIRES</title>
	<style>
    .rating {
        unicode-bidi: bidi-override;
        direction: rtl;
        text-align: center;
        margin-left: auto;
        margin-right: auto;
    }
    .rating > input {
        display: none;
    }
    .rating > label {
        display: inline-block;
        width: 10px;
        height: 30px;
        margin-right: 2px;
        font-size: 24px;
        color: #ccc;
        cursor: pointer;
    }
    .rating > input:checked ~ label,
    .rating > input:checked ~ label ~ label {
        color: #ffca08;
    }

</style>
</head>
<body>
	<div id="main">
		<header>
			<nav>
				<a href="#"><img src="assets/img/2.png" width="100" height="60"></a>
				<ul>
					<li><a href="index.php">ACCUEIL</a></li>
					<li><a href="#">SERVICES</a></li>
					<li><a href="galerie.php">GALERIE</a></li>
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
			<p style="text-align: center;font-family: 'Century Gothic';"><p style=""><?php echo $message ?></p></p>
		<section class="formulaire">
			<form action="../admin/app/traitement/visiteur/createCommentaire.php" method="POST">
				<input type="text" name="nom" placeholder="Nom" required><br>
				<textarea name="commentaire" placeholder="Laissez-nous un mot" cols="42">
				</textarea><br>
				<div class="form-group">
                <div class="rating">
                    <input type="radio" id="star5" name="note" value="5">
                    <label for="star5">&#9733;</label>
                    <input type="radio" id="star4" name="note" value="4">
                    <label for="star4">&#9733;</label>
                    <input type="radio" id="star3" name="note" value="3">
                    <label for="star3">&#9733;</label>
                    <input type="radio" id="star2" name="note" value="2">
                    <label for="star2">&#9733;</label>
                    <input type="radio" id="star1" name="note" value="1">
                    <label for="star1">&#9733;</label>
                </div>
             </div>
				<input type="submit" value="Poster"><br>

			</form>
			
			<div>
				<?php 
					foreach ($listeCommentaires as $Commentaires) {
				?>
				<p style="font-size: 12px;;text-align: left;">
					<?php echo 
						'Nom: '.$Commentaires['nom']."<br>"
						.'Commentaires: '.$Commentaires['commentaire']."<br>"
						.'Note: '.$Commentaires['note']."<br>"
						.'Date publication: '.$Commentaires['date_creation']."<br>"; 
					?>
				</p>
				<?php 
					}
				?>
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
			<p><a href="AVIS.php">Voir tous les avis clients v-parrot.com</a><span>&nbsp;></span></p>
		</div>
		<?php include 'footer.php'; ?>
	</div>
</body>
</html>