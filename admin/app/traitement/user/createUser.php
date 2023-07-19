<?php
//const BASE_PATH  = '../../../../';
//include "../../../../core/autoloader.php";
include '../../../../Models/Visiteur.php';
include '../../../../Models/Admin.php';
include '../../../../Models/Employe.php';
include '../../../../controllers/Crud.php';
include '../../../../controllers/DataBase.php';
$admin = new Admin();
$repone = $admin->createUser($_POST);
if ($repone==200){
    header('location:../../views/pages/admin.php?r=1');
}else{
    header('location:../../views/pages/admin.php?r=0');
}