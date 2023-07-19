<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">MON PANEL</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="#"><i class="fa fa-home fa-fw"></i> Site web</a></li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <?php echo $sessionUser['nom'].' '.$sessionUser['prenom']?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">

                <li class="divider"></li>
                <li>
                    <a href="../../traitement/loginOut.php"><i class="fa fa-sign-out fa-fw"></i> Se déconnecter</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->
</nav>

<aside class="sidebar navbar-default" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                </div>
                <!-- /input-group -->
            </li>

            <li>
                <a href="admin.php"><i class="fa fa-chevron-right fa-fw"></i> Créer Utilisateur</a>
                <a href="service.php"><i class="fa fa-chevron-right fa-fw"></i> Publier un service</a>
                <a href="horaires.php"><i class="fa fa-chevron-right fa-fw"></i> Publier les horaires</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</aside>