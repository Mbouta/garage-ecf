<?php
session_start();
$sessionUser = $_SESSION['user']; //session []
//const BASE_PATH  = '../../../../';
//include "../../../../core/autoloader.php";
include '../../../../Models/Visiteur.php';
include '../../../../Models/Admin.php';
include '../../../../Models/Employe.php';
include '../../../../controllers/Crud.php';
include '../../../../controllers/DataBase.php';
$admin = new Admin();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Voiture</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/metisMenu.min.css" rel="stylesheet">
        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">
        <link href="../css/startmin.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <?php
            include "menu/menu-admin.php";
            ?>
            <!-- /.sidebar -->

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Tables</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php $state = isset($_GET['r']) == 0 ? "<span class='text-danger'>Opération echouée</span>" : "<span style='font-weight: bold' class='text-success'>Opération réussie</span>" ?>
                                    Liste des utilisateurs <?php echo $state?>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <button class="btn btn-primary" id="openModalBtn" data-toggle="modal" data-target="#myModal">Ajouter un utilisateur</button>

                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="myModalLabel">Créer un utilisateur</h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="../../traitement/user/createUser.php" method="post">
                                                            <div class="form-group">
                                                                <label>Text Nom</label>
                                                                <input required type="text" name="nom" placeholder="Nom utilisateur" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Prénom</label>
                                                                <input required type="text" name="prenom" placeholder="Prénom utilisateur" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input required name="email" type="email" placeholder="Email utilisateur" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input required name="mot_de_passe" type="password" placeholder="password utilisateur" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Type compte</label>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input required type="radio" name="type_compte" id="optionsRadios1" value="admin" checked>Admin
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="type_compte" id="optionsRadios2" value="employe">Employé
                                                                    </label>
                                                                </div>
                                                            </div>
                                                                <button type="submit" class="btn btn-primary">Créer</button>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Email</th>
                                                    <th>Type de compte</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($admin->selectAllUser() as $user) {?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo  $user['nom'] ?></td>
                                                    <td><?php echo  $user['prenom'] ?></td>
                                                    <td><?php echo  $user['email'] ?></td>
                                                    <td><?php echo  $user['type_compte'] ?></td>
                                                    <td class="center">
                                                        <button id="openModalBtn<?php echo $user['id']?>" data-toggle="modal" data-target="#myModal<?php echo $user['id']?>" class="text-warning"><i class="fa fa-pencil">Modifier</i></button>
                                                        <button class="text-danger"><a href="../../traitement/user/deleteUser.php?id=<?php echo $user['id']?>"> <i class="text-danger fa fa-trash">Supprimer</i></a></button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="myModal<?php echo $user['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="modal-title" id="myModalLabel">Modifier <?php echo $user['nom']?></h2>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form action="../../traitement/user/updateUser.php" method="post">
                                                                    <div class="form-group">
                                                                        <label>Text Nom</label>
                                                                        <input required type="hidden" name="id" value="<?php echo $user['id']?>" class="form-control">
                                                                        <input required type="text" name="nom" value="<?php echo $user['nom']?>" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Prénom</label>
                                                                        <input required type="text" name="prenom" value="<?php echo $user['prenom']?>" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input required name="email" type="email" value="<?php echo $user['email']?>" class="form-control">
                                                                    </div>

                                                                    <!--<div class="form-group">
                                                                        <label>Nouveau mot de passe</label>
                                                                        <input required name="mot_de_passe" type="password" value="<?php /*echo $user['mot_de_passe']*/?>" class="form-control">
                                                                    </div>-->

                                                                    <div class="form-group">
                                                                        <label>Type compte</label>
                                                                        <?php
                                                                        if ($user['type_compte']=="admin") {?>
                                                                            <div class="radio">
                                                                                <label>
                                                                                    <input required type="radio" name="type_compte" id="optionsRadios1" value="admin" checked>Admin
                                                                                </label>
                                                                            </div>
                                                                            <div class="radio">
                                                                                <label>
                                                                                    <input type="radio" name="type_compte" id="optionsRadios2" value="employe">Employé
                                                                                </label>
                                                                            </div>
                                                                        <?php }else{ ?>
                                                                            <div class="radio">
                                                                                <label>
                                                                                    <input required type="radio" name="type_compte" id="optionsRadios1" value="admin">Admin
                                                                                </label>
                                                                            </div>
                                                                            <div class="radio">
                                                                                <label>
                                                                                    <input checked type="radio" name="type_compte" id="optionsRadios2" value="employe">Employé
                                                                                </label>
                                                                            </div>
                                                                       <?php } ?>

                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Modifier</button>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php }?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->

                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>

    </body>

</html>