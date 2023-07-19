<?php
session_start();
session_destroy();
header('location:../../app/views/pages/login.php');
