<?php
//const BASE_PATH  = '../../../../';
//include "../../../../core/autoloader.php";
include '../../../../Models/Visiteur.php';
include '../../../../Models/Admin.php';
include '../../../../Models/Employe.php';
include '../../../../controllers/Crud.php';
include '../../../../controllers/DataBase.php';
$employe = new Employe();
if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){
    $filename = $_FILES["file"]["name"];
    $filetype = $_FILES["file"]["type"];
    $filesize = $_FILES["file"]["size"];
    $random_name = uniqid() . "service." . pathinfo($filename, PATHINFO_EXTENSION);

    $uploadDir = "images/";
    move_uploaded_file($_FILES["file"]["tmp_name"], $uploadDir . $random_name);

    $data = array(
        "nom"=>$_POST['nom'],
        "annee_circulation"=>$_POST['annee_circulation'],
        "kilometrage"=>$_POST['kilometrage'],
        "prix"=>$_POST['prix'],
        "caracteristiques"=>$_POST['caracteristiques'],
        "image"=>$random_name,
    );
    $repone = $employe->updateVoiture($data,array("id"=>$_POST['id']));
    if ($repone==200){
        header('location:../../views/pages/voiture.php?r=1');
    }else{
        header('location:../../views/pages/voiture.php?r=0');
    }
}else{
    $data = array(
        "nom"=>$_POST['nom'],
        "annee_circulation"=>$_POST['annee_circulation'],
        "kilometrage"=>$_POST['kilometrage'],
        "prix"=>$_POST['prix'],
        "caracteristiques"=>$_POST['caracteristiques'],
    );
    $repone = $employe->updateVoiture($data,array("id"=>$_POST['id']));
    if ($repone==200){
        header('location:../../views/pages/voiture.php?r=1');
    }else{
        header('location:../../views/pages/voiture.php?r=0');
    }
}

