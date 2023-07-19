<?php
include "../core/autoloader.php";
/*spl_autoload_register(function($className) {
    $className = str_replace('\\', '/', $className);
    include '../controllers/' . $className . '.php';
});*/

$crud = new Crud();

/**
 * Retourne 1 ligne trouvée
 */
/*$data = $crud->findOne('rh_employer',"1006");
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



