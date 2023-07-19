<?php
session_start();
$sessionUser = $_SESSION['user']; //session []
//const BASE_PATH  = '../../../../';
//include "../../../../core/autoloader.php";
include '../../../../Models/Visiteur.php';
include '../../../../Models/Admin.php';
include '../../../../controllers/Crud.php';
include '../../../../Models/Employe.php';
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

        <title>Horaire</title>
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
                            <h1 class="page-header">Horaires</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php $state = isset($_GET['r']) == 0 ? "<span class='text-danger'>Opération echouée</span>" : "<span style='font-weight: bold' class='text-success'>Opération réussie</span>" ?>
                                    Liste des horaires <?php echo $state?>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <?php
                                        if(sizeof($admin->selectAllHoraire())>6){
                                            ?>
                                            <button disabled class="btn btn-danger">Ajouter une horaire</button>
                                            <?php
                                        }else{
                                            ?>
                                            <button class="btn btn-primary" id="openModalBtn" data-toggle="modal" data-target="#myModal">Ajouter une horaire</button>
                                            <?php
                                        }
                                        ?>

                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="myModalLabel">Créer une horaire</h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="../../traitement/horaires/createHoraire.php" method="post">
                                                            <div class="form-group">
                                                                <label>Jour</label>
                                                                <select required name="jour" class="form-control">
                                                                    <option value="">Choix du jour</option>
                                                                    <option value="Lundi">Lundi</option>
                                                                    <option value="Mardi">Mardi</option>
                                                                    <option value="Mercredi">Mercredi</option>
                                                                    <option value="Jeudi">Jeudi</option>
                                                                    <option value="Vendredi">Vendredi</option>
                                                                    <option value="Samedi">Samedi</option>
                                                                    <option value="Dimanche">Dimanche</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Matinée</label>
                                                                <input  type="text" name="am" placeholder="07h-30 à 12h30" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Après midi</label>
                                                                <input  type="text" name="pm" placeholder="07h-30 à 12h30" class="form-control">
                                                            </div>


                                                            <div class="form-group">
                                                                <label>Statut</label>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input required type="radio" name="status" id="optionsRadios1" value="1" checked>Ouvert
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="status" id="optionsRadios2" value="0">Fermé
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
                                                    <th>Jour</th>
                                                    <th>AM</th>
                                                    <th>PM</th>
                                                    <th>Statut</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($admin->selectAllHoraire() as $horaire) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo  $horaire['jour'] ?></td>
                                                    <td><?php echo  $horaire['am'] ?></td>
                                                    <td><?php echo  $horaire['pm'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($horaire['status'] == "1") {
                                                            ?>
                                                        <span class='text-success'>Ouvert</span>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <span class='text-danger'>Fermé</span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="center">
                                                        <button id="openModalBtn<?php echo $horaire['id']?>" data-toggle="modal" data-target="#myModal<?php echo $horaire['id']?>" class="text-warning"><i class="fa fa-pencil">Modifier</i></button>
                                                        <button class="text-danger"><a href="../../traitement/horaires/deleteHoraire.php?id=<?php echo $horaire['id']?>"> <i class="text-danger fa fa-trash"></i></a>Supprimer</button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="myModal<?php echo $horaire['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="modal-title" id="myModalLabel">Modifier <?php echo $horaire['jour']?></h2>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form action="../../traitement/horaires/updateHoraires.php" method="post">
                                                                    <div class="form-group">
                                                                        <label>Jour</label>
                                                                        <input required type="hidden" name="id" value="<?php echo $horaire['id']?>" class="form-control">
                                                                         <select required name="jour" class="form-control">
                                                                            <option value="<?php echo $horaire['jour']?>">Choix actuel - <?php echo $horaire['jour']?></option>
                                                                            <option value="Lundi">Lundi</option>
                                                                            <option value="Mardi">Mardi</option>
                                                                            <option value="Mercredi">Mercredi</option>
                                                                            <option value="Jeudi">Jeudi</option>
                                                                            <option value="Vendredi">Vendredi</option>
                                                                            <option value="Samedi">Samedi</option>
                                                                            <option value="Dimanche">Dimanche</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Am</label>
                                                                        <input type="text" name="am" value="<?php echo $horaire['am']?>" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Pm</label>
                                                                        <input name="pm" type="text" value="<?php echo $horaire['pm']?>" class="form-control">
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label>Type compte</label>
                                                                        <?php
                                                                        if ($horaire['status']=="1") {?>
                                                                            <div class="radio">
                                                                                <label>
                                                                                    <input required type="radio" name="status" id="optionsRadios1" value="1" checked>Ouvert
                                                                                </label>
                                                                            </div>
                                                                            <div class="radio">
                                                                                <label>
                                                                                    <input type="radio" name="status" id="optionsRadios2" value="0">Fermé
                                                                                </label>
                                                                            </div>
                                                                        <?php }else{ ?>
                                                                            <div class="radio">
                                                                                <label>
                                                                                    <input required type="radio" name="status" id="optionsRadios1" value="1">Ouvert
                                                                                </label>
                                                                            </div>
                                                                            <div class="radio">
                                                                                <label>
                                                                                    <input checked type="radio" name="status" id="optionsRadios2" value="0">Fermé
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

                                            <?php } ?>

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
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/metisMenu.min.js"></script>
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>
        <script src="../js/startmin.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>

    </body>

</html>