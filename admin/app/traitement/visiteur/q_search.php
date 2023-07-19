<?php
//const BASE_PATH  = '../../../../';
//include "../../../../core/autoloader.php";
include '../../../../Models/Visiteur.php';
include '../../../../Models/Admin.php';
include '../../../../Models/Employe.php';
include '../../../../controllers/Crud.php';
include '../../../../controllers/DataBase.php';
$prix_min = $_POST['prix_min'];
$prix_max = $_POST['prix_max'];

$visiteur = new Visiteur();
$filterVoiture = $visiteur->filterByPriceVoiture($prix_min,$prix_max);
const IMAGE_PATH_VOITURE = '../admin/app/traitement/voiture/images/';

?>
<?php
foreach ($filterVoiture as $voiture)
{
    ?>
    <div class="one">
        <img src="<?php echo IMAGE_PATH_VOITURE.$voiture['image'] ?> " width="200" height="200">
        <h4><?php echo $voiture['nom'] ?></h4>
        <p><?php  echo $voiture['prix']." <strong>euros</strong>"; ?></p>
        <!-- Button trigger modal -->
        <a href="details.php?id=<?php echo $voiture['id']?>&nom=<?php echo $voiture['nom']?>&prix=<?php echo $voiture['prix']?>&caracteristiques=<?php echo $voiture['caracteristiques']?>" class="first">Commander</a>
        <a href="#" class="second" data-bs-toggle="modal" data-bs-target="#contactModal">Contacter</a>
        <!-- Tous les modals pour faciliter la récupération -->
    </div>
    <!-- Modal Détails Commander-->

    <?php
}
?>

