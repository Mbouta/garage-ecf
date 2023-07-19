<?php
//const BASE_PATH  = '../../../../';
//include "../../../../core/autoloader.php";
include '../../../../Models/Visiteur.php';
include '../../../../Models/Admin.php';
include '../../../../Models/Employe.php';
include '../../../../controllers/Crud.php';
include '../../../../controllers/DataBase.php';
$employe = new Employe();
$imagesData = array();

for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
    if ($_FILES["file"]["error"][$i] == 0) {
        $filename = $_FILES["file"]["name"][$i];
        $filesize = $_FILES["file"]["size"][$i];
        $random_name = uniqid() . "voiture." . pathinfo($filename, PATHINFO_EXTENSION);

        $uploadDir = "images/";
        move_uploaded_file($_FILES["file"]["tmp_name"][$i], $uploadDir . $random_name);

        $imagesData[] = array(
            "id_voiture" => $_POST['id_voiture'],
            "image" => $random_name,
        );
    }
}

// Insérer les données des images dans la base de données
foreach ($imagesData as $data) {
    $response = $employe->createVoitureImages($data);
    if ($response != 200) {
        header('location: ../../views/pages/voiture.php?r=0');
        exit();
    }
}

header('location: ../../views/pages/voiture.php?r=1');
exit();




