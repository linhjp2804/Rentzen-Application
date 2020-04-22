<?php 
include '../common/configuration.php';
include '../model/database.php';
include '../model/properties_db.php';
include '../model/persons_db.php';
include '../model/rental_apps_db.php';

$message = "";

session_start();

//get out all session variables
if ($_SESSION['TYPE'] == 'visitor'){
    $message = "Please log in first";
    header('Location:../persons?signin');
} else {
    $username = $_SESSION['USERNAME'];
    $renter_id = $_SESSION['RENTER_ID'];
    $landlord_id = $_SESSION['LANDLORD_ID'];
}

//get default values
$properties = "";
$property_id = filter_input(INPUT_POST,'property_id'); 
$property_info = getProperty($property_id);


// if the list token was not provided, go back to the landing page
if (!isset($_SESSION['LOGGED_IN'])){
    header('Location: ../index.php');
    exit();
}

// if the logout button was clicked....
if (isset($_POST['btn_logout'])){
    header('Location: ../persons?logout');
    exit();
}


// for both landlords and renter
$app_view_id = filter_input(INPUT_GET,'rental_app_id', FILTER_VALIDATE_INT);
if (!empty($app_view_id)){
    $app_view = getRentalApp($app_view_id);
    if ($_SESSION['TYPE'] == 'landlord') {
    //sort($pending_list);
    include 'app_view_landlord.php';
    exit();
    
    } elseif ($_SESSION['TYPE'] == 'renter') {
    //sort($pending_list);
    include 'app_view_renter.php';
    exit(); 
    }
}

//Section 1: Landlord controls
if($_SESSION['TYPE'] == 'landlord' && isset($_GET['list'])) {
    $rental_applications = getRentalAppsRenter ($renter_id);
    $user_info = getPerson($renter_id);
    include 'app_list_landlord.php';
    exit();
}


// Section 2: Renter controls

if ($_SESSION['TYPE'] == 'renter' && isset($_POST['APPLY'])){
    $property_info = getProperty($_POST['property_id']);
    $renter_info = getPerson($renter_id);
    include 'app_submit.php';
    exit();
}

if ($_SESSION['TYPE'] == 'renter' && (isset($_POST['SUBMIT']))) {
    $move_in_date = filter_input(INPUT_POST,'movein');
    $renter_message = filter_input(INPUT_POST,'renter_message');
    if ((empty($renter_id)) && empty($move_in_date)) {
        $message = "<div class='alert alert-danger'>One or more required fields are missing.</div>";
        include('app_submit.php');
        exit();
    } else {
        $confirmation = addApp($renter_id, $property_id, $move_in_date,$renter_message);
        if ($confirmation != false)
        {
            include 'app_confirm.php';
            exit();
        }   else {
            $message = "<div class='alert alert-danger'>An unexpected error occurred.</div>";
        }
    }
}


if (($_SESSION['TYPE'] == 'renter') && ISSET($_GET['view_apps'])){
    $rental_applications = getRentalAppsRenter ($renter_id);
    include 'app_list_renter.php';
    exit();
}


?>