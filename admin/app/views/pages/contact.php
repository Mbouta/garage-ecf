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
$employe = new Employe();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Contact</title>

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

        <style>
            .rating {
                unicode-bidi: bidi-override;
                direction: rtl;
                text-align: center;
            }
            .rating > input {
                display: none;
            }
            .rating > label {
                display: inline-block;
                width: 30px;
                height: 30px;
                margin-right: 2px;
                font-size: 24px;
                color: #ccc;
                cursor: pointer;
            }
            .rating > input:checked ~ label,
            .rating > input:checked ~ label ~ label {
                color: #ffca08;
            }

        </style>
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <?php
            include "menu/menu-employe.php";
            ?>
            <!-- /.sidebar -->

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Contact</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                     Liste des Avis
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
<!--                                        <button class="btn btn-primary" id="openModalBtn" data-toggle="modal" data-target="#myModal">Ajouter un avis</button>-->

                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="myModalLabel">Créer un avis</h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="../../traitement/temoignage/createAvis.php" method="post">
                                                            <div class="form-group">
                                                                <label>Nom</label>
                                                                <input required type="text" name="nom" placeholder="Nom utilisateur" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Commentaire</label>
                                                                <textarea required type="text" name="commentaire" placeholder="Prénom utilisateur" class="form-control"></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Note</label>
                                                                <div class="rating">
                                                                    <input type="radio" id="star5" name="note" value="5">
                                                                    <label for="star5">&#9733;</label>
                                                                    <input type="radio" id="star4" name="note" value="4">
                                                                    <label for="star4">&#9733;</label>
                                                                    <input type="radio" id="star3" name="note" value="3">
                                                                    <label for="star3">&#9733;</label>
                                                                    <input type="radio" id="star2" name="note" value="2">
                                                                    <label for="star2">&#9733;</label>
                                                                    <input type="radio" id="star1" name="note" value="1">
                                                                    <label for="star1">&#9733;</label>
                                                                </div>
                                                             </div>

                                                            <input type="hidden" name="type_commentaire" value="employe">
                                                            <input type="hidden" name="date_creation" value="<?php echo date('Y-m-d')?>">
                                                            <input type="hidden" name="status" value="1">

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
                                                    <th>Téléphone</th>
                                                    <th>Sujet</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($employe->selectAllContact() as $contact) {?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo  $contact['nom'] ?></td>
                                                    <td><?php echo  $contact['prenom'] ?></td>
                                                    <td><?php echo  $contact['email'] ?></td>
                                                    <td><?php echo  $contact['telephone'] ?></td>
                                                    <td><?php echo  $contact['sujet'] ?></td>
                                                    <td class="center">
                                                        <button id="openModalBtn<?php echo $contact['id']?>" data-toggle="modal" data-target="#myModal<?php echo $contact['id']?>" class="text-warning"><i class="fa fa-eye"></i> Voir</button>
                                                     </td>
                                                </tr>

                                                <div class="modal fade" id="myModal<?php echo $contact['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="modal-title" id="myModalLabel">Modifier <?php echo $contact['nom']?></h2>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><?php echo $contact['message'] ;?></p>
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