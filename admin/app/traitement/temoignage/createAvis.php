<?php
//const BASE_PATH  = '../../../../';
//include "../../../../core/autoloader.php";
include '../../../../Models/Visiteur.php';
include '../../../../Models/Admin.php';
include '../../../../Models/Employe.php';
include '../../../../controllers/Crud.php';
include '../../../../controllers/DataBase.php';
$employe = new Employe();

$repone = $employe->createTemoignage($_POST);
if ($repone==200){
    header('location:../../views/pages/employe.php?r=1');
}else{
    header('location:../../views/pages/employe.php?r=0');
}