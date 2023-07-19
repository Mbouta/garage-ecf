<?php 

//const BASE_PATH  = '../../../../';
//include "../../../../core/autoloader.php";
include '../../../../Models/Visiteur.php';
include '../../../../Models/Admin.php';
include '../../../../Models/Employe.php';
include '../../../../controllers/Crud.php';
include '../../../../controllers/DataBase.php';
$contactVisiteur = new Visiteur();
$insertVisiteur = $contactVisiteur->contactAdmin($_POST);

if ($insertVisiteur == 200) {

	$sucess = "<span style='color:green'>"."Merci de nous avoir écrit. Nous vous contacterons dans les 24h."."</span>";
	header('location: http://localhost:8081/projet-garage/public/contact.php?message='.$sucess);
}
else {
	$failed = "<span style='color:red;'>"."Un problème est survenu. Merci de réessayer."."</span>";
	header('location: http://localhost:8081/projet-garage/public/contact.php?message='.$failed);
}
// var_dump($insertVisiteur);