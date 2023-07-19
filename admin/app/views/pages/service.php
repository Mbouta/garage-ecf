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

        <title>Services</title>
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

        <script src="https://cdn.tiny.cloud/1/zx3bv4hj020vfscgsr8cdlq7b8dar9yphkqc3mplt0dr3puz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

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
                            <h1 class="page-header">Services</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php $state = isset($_GET['r']) == 0 ? "<span class='text-danger'>Opération echouée</span>" : "<span style='font-weight: bold' class='text-success'>Opération réussie</span>" ?>
                                    Liste des services <?php echo $state?>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <button class="btn btn-primary" id="openModalBtn" data-toggle="modal" data-target="#myModal">Ajouter un service</button>

                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="myModalLabel">Créer un service</h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="../../traitement/service/createService.php" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input required name="file" type="file" placeholder="password utilisateur" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Text Nom</label>
                                                                <input required type="text" name="titre" placeholder="Titre service" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Contenu</label>
                                                            <textarea class="form-control" name="contenu"></textarea>
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
                                                    <th>Titre</th>
<!--                                                    <th>contenu</th>-->
                                                    <th>Image</th>
                                                    <th>date de création</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($admin->selectAllService() as $service) {?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo  $service['titre'] ?></td>
<!--                                                    <td>--><?php //echo  $service['contenu'] ?><!--</td>-->
                                                    <td><img width="100" src="../../traitement/service/images/<?php echo  $service['image'] ?>"></td>
                                                    <td><?php echo  $service['date_creation'] ?></td>
                                                    <td class="center">
                                                        <button id="openModalBtn<?php echo $service['id']?>" data-toggle="modal" data-target="#myModal<?php echo $service['id']?>" class="text-warning"><i class="fa fa-pencil">Modifier</i></button>
                                                        <button class="text-danger"><a href="../../traitement/service/deleteService.php?id=<?php echo $service['id']?>"> <i class="text-danger fa fa-trash">Supprimer</i></a></button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="myModal<?php echo $service['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="modal-title" id="myModalLabel">Modifier <?php echo $service['titre']?></h2>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form action="../../traitement/service/updateService.php" enctype="multipart/form-data" method="post">

                                                                    <img width="100" src="../../traitement/service/images/<?php echo  $service['image'] ?>"/>
                                                                    <br>
                                                                    <br>
                                                                    <div class="form-group">
                                                                        <label>Image (pas obligatoire pour lm áodification)</label>
                                                                        <input name="file" type="file" placeholder="password utilisateur" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Text Nom</label>
                                                                        <input required type="hidden" name="id" value="<?php echo $service['id']?>" class="form-control">
                                                                        <input required type="text" name="titre" value="<?php echo $service['titre']?>" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Contenu</label>
                                                                        <textarea class="form-control" name="contenu"><?php echo $service['contenu']?></textarea>
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
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>
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