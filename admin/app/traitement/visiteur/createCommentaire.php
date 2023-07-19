<?php 

//const BASE_PATH  = '../../../../';
//include "../../../../core/autoloader.php";
include '../../../../Models/Visiteur.php';
include '../../../../Models/Admin.php';
include '../../../../Models/Employe.php';
include '../../../../controllers/Crud.php';
include '../../../../controllers/DataBase.php';
$data = [

	'nom' => $_POST['nom'],
	'commentaire' => $_POST['commentaire'],
	'note' => $_POST['note'],
	'type_commentaire' => 'visiteur',
	'date_creation' => date('Y-m-d'),
	'status' => '0',
	
];


$creatCommentaires = new Visiteur();
$insertCommentaires = $creatCommentaires->createTemoignage($data);

if ($insertCommentaires == 200) {

	$sucess = "<span style='color:green'>"."Commentaire envoyé."."</span>";
	header('location: http://localhost:8081/projet-garage/public/avis.php?message='.$sucess);
}
else {
	$failed = "<span style='color:red;'>"."Un problème est survenu. Merci de réessayer ou contacter l'administrateur."."</span>";
	header('location: http://localhost:8081/projet-garage/public/avis.php?message='.$failed);
}


?>