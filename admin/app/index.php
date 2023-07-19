<?php
include "autoloader.php";

$users = new Utilisateur();
$data = array(
    "nom"=>"Fibalos",
    "prenom"=>"lodos",
    "email"=>"@fibalos",
    "mot_de_passe"=>base64_encode("azerurizuri"),
    "type_compte"=>"employe",
);
//$resp = $users->createUser($data);
//$resp = $users->login("@employe","1234");
//$resp = $users->logout();

//$resp = $users->updateUser($data,array("id"=>3));

//$resp = $users->deleteUser(array("id"=>3));

/**
 * ADMIN
 */
$admin = new Admin();

/*if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){
    $filename = $_FILES["file"]["name"];
    $filetype = $_FILES["file"]["type"];
    $filesize = $_FILES["file"]["size"];
    $random_name = uniqid()  ."." . pathinfo($filename, PATHINFO_EXTENSION);

    $uploadDir = "images/";
    move_uploaded_file($_FILES["file"]["tmp_name"], $uploadDir . $random_name);

    $data = array(
        "titre"=>"Mon titre",
        "contenu"=>"Content",
        "image"=>$random_name,
    );
}

//$res = $admin->createService($data);
//$resp = $users->updateUser($data,array("id"=>3));*/
//var_dump($res);


/**
 * HORAIRES
 */
$dataHoraire = array(
    "jour"=>"Dimanches",
    "am"=>"",
    "pm"=>"",
    "status"=>"0",
);
//$horaire = $admin->createHoraire($dataHoraire);
//$horaire = $admin->updateHoraire($dataHoraire,array("id"=>7));
//$horaire = $admin->deleteHoraire(array("id"=>9));
//$horaire = $admin->closeDay($dataHoraire,array("id"=>1));
//var_dump($horaire);



/**
 * Retourne 1 ligne trouvée
 */
/*$data = $crud->selectOne('rh_employer',"1049");
var_dump($data['nom']);*/

// Utilisation des données récupérées
/*
$data = $crud->findAll('rh_employer');
foreach ($data as $row) {
    // Traitement des résultats
    var_dump($row['id']);
}*/

/**
 * Retourne 1 ligne trouvée avec la clause where et l'operateur AND
 */
//$data = $crud->findByFieldWhereAnd("rh_employer",array("genre"=>"M","nombre_enfant"=>"0"));

/**
 * Retourne plusieurs lignes trouvées avec la clause where et l'operateur OR
 */
//$data = $crud->findByFieldWhereOR("rh_employer",array("genre"=>"M","status"=>"1"));

/*$data = [
    'matricule' => 'john.doe@example.com',
    'real_name' => 30
];
$crud->insert("rh_cnss",$data);*/

/**
 * Modifie 1 ligne trouvée avec la clause where et l'operateur AND
 */
//Modification
/*$data = [
    'matricule' => 'John Doe',
    'real_name' => 'ema.doe@example.com'
];
$condition = [
    'id' => 1
];
$affectedRows = $crud->update('rh_cnss', $data, $condition);

if ($affectedRows > 0) {
    echo "La modification a été effectuée avec succès.";
} else {
    echo "Aucune modification n'a été effectuée.";
}*/

/**
 * Suppression d'une ligne trouvée
 */
/*$condition = [
    'id' => 5
];
$affectedRows = $crud->delete('rh_cnss', $condition);

if ($affectedRows > 0) {
    echo "La suppression a été effectuée avec succès.";
} else {
    echo "Aucune suppression n'a été effectuée.";
}*/

/**
 * Supprime tout
 */
/*$affectedRows = $crud->deleteAll('users');

if ($affectedRows > 0) {
    echo "La suppression de toutes les données a été effectuée avec succès.";
} else {
    echo "Aucune suppression de données n'a été effectuée.";
} */



/**
 * Compte le nombre de ligne trouvé
 */

/*
 // Comptage de toutes les lignes dans la table 'users'
$totalRows = $crud->count('rh_employer');
echo "Nombre total de lignes dans la table 'users': $totalRows";

// Comptage des lignes dans la table 'users' avec une condition
$condition = [
    'genre' => "m",
];
$filteredRows = $crud->count('rh_employer', $condition);
echo "Nombre de lignes dans la table 'users' avec l'âge de 25 et la ville de Paris: $filteredRows";
 */

/**
 * Select LIKE
 * patterns = tableau de recherche K.V
 */
/*$patterns = [
    'nom' => 'BAFO',
    'nationalite' => 'Iv'
];
$results = $crud->selectWithLike('rh_employer', $patterns);
foreach ($results as $result) {
    // Faites quelque chose avec chaque résultat
    echo $result['nom'] . ', ' . '<br>';
}*/



