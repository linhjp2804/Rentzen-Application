<?php 
include '../common/configuration.php';
include '../model/database.php';
include '../model/properties_db.php';
include '../model/rental_apps_db.php';
include '../model/persons_db.php';

session_start();

if (isset($_GET['about'])){
    include 'aboutus.php';
    exit();
}

if (isset($_GET['help'])) {
    include 'help.php';
    exit();
}

?>

