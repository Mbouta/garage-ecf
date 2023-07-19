<?php 
//const BASE_PATH = '../';
//include '../core/autoloader.php';
include '../Models/Visiteur.php';
include '../controllers/Crud.php';
include '../controllers/DataBase.php';

$afficheHeure = new Visiteur();
$listeHoraire = $afficheHeure->selectAllHoraire();

foreach ($listeHoraire as $horaire) {
    
    $statut = 'Ouvert';

    if ($horaire['status'] == '0') {
        $statut = 'Fermé';
    }
    echo $horaire['jour'].': '.$horaire['am'].' - '.$horaire['pm'].' '.$statut."<br>";
    
}

// Récupération des SERVICES DE L'ACCUEIL
const IMAGE_PATH_SERVICE = '../admin/app/traitement/service/images/';

$afficheService = new Visiteur();
$listeService = $afficheHeure->selectAllService();
    // var_dump($listeService);
 // echo "<img src=".IMAGE_PATH.">";

    foreach ($listeService as $service) {
       echo "<img src=".IMAGE_PATH_SERVICE.$service['image'].">".$service['titre'].$service['contenu']."<br>";
    }

// Récupération des SERVICES DE L'ACCUEIL
$afficheVoiture = new Visiteur();
$listeVoiture = $afficheVoiture->selectAllVoiture();
    // var_dump($listeService);
 // echo "<img src=".IMAGE_PATH.">";

const IMAGE_PATH_VOITURE = '../admin/app/traitement/voiture/images/';

    foreach ($listeVoiture as $voiture) {
       echo "<img src=".IMAGE_PATH_VOITURE.$voiture['image'].">".$voiture['nom'].$voiture['prix']."<br>";
    }





?>