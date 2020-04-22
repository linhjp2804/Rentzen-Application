<?php 
include '../common/configuration.php';
include '../model/database.php';
include '../model/persons_db.php';
include '../model/properties_db.php';
include '../model/rental_apps_db.php';


/* starting the session is a little more tricky on the user controller */
if (!isset($_SESSION)){
    session_start();
    if (!isset($_SESSION['TYPE'])){
        $_SESSION['TYPE'] = 'visitor';
    }
}

//SECTION A: SIGN IN FOR BOTH LANDLORDS AND RENTERS
$message = "";

if (isset($_GET['choose'])){
    include 'person_choose.php';// create a file callled person_choose to sign up
    exit();
}

if (isset($_GET['signin'])){
    include 'person_signin.php';// create a file callled person_choose to sign up
    exit();
}

if (isset($_GET['signup'])){
    include 'person_choose.php';// create a file callled person_choose to sign up
    exit();
}

if (isset($_GET['logout'])){
    include 'person_logout.php';
    exit();
}

if (isset($_POST['submitAsLandlord'])){ 
    include 'person_signup_landlord.php';
    exit();
}

if (isset($_POST['submitAsRenter'])){ 
    include 'person_signup_renter.php';
    exit();
}

if (isset($_GET['profile']) && $_SESSION['TYPE'] === 'landlord'){
    include 'person_menu_landlord.php';// create a file callled person_choose to sign up
    exit();
}

if (isset($_GET['profile']) && $_SESSION['TYPE'] === 'renter'){
    include 'person_menu_renter.php';// create a file callled person_choose to sign up
    exit();
}

if (isset($_GET['logout'])){
    include 'person_logout.php';
    exit();
}

if (isset($_POST['confirmationL'])){
    $usernameL = filter_input(INPUT_POST,'usernameL',FILTER_VALIDATE_EMAIL);
    $passwordL = filter_input(INPUT_POST,'passwordL');
    if (empty($usernameL) || empty($passwordL)){
        $message = "Please don't leave any field blank. Please try again.";
        include 'person_signup_landlord.php';
        exit();
    } else {
        addPerson($usernameL,$passwordL,102);
        include 'person_signup_confirmation.php';
        exit();
    } 
    }

if (isset($_POST['confirmationR'])){
    $usernameR = filter_input(INPUT_POST,'usernameR',FILTER_VALIDATE_EMAIL);
    $passwordR = filter_input(INPUT_POST,'passwordR');
    if (empty($usernameR) || empty($passwordR)){
        $message = "Please don't leave any field blank. Please try again.";
        include 'person_signup_renter.php';
        exit();
    } else {
        addPerson($usernameR,$passwordR,101);
        include 'person_signup_confirmation.php';
        exit();
    } 
    }

if (isset($_POST['sign-in-renter'])) 
{
    $username = filter_input(INPUT_POST,'username',FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST,'password');
    if (empty($username) || empty($password)){
        $message = "Please don't leave any field blank. Please try again.";
        include 'person_signin.php';
        exit();
    } else {
    $renter_id = loginPeople($username,$password,101);

    if (!empty($renter_id)){

        $_SESSION['LOGGED_IN']='OK';
        $_SESSION['TYPE']='renter';
        $_SESSION['RENTER_ID'] = $renter_id; //assign value into session variable
        $_SESSION['LANDLORD_ID'] = null;
        $_SESSION['USERNAME'] = $username;

        include 'person_menu_renter.php';
        exit();
    } else
    {
        $message = "Login failed. Please try again.";
        include 'person_signin.php';
        exit();
    }
}
}


if (isset($_POST['sign-in-landlord'])) {
    $username = filter_input(INPUT_POST,'username', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST,'password');
    if (empty($username) || empty($password)){
        $message = "Please don't leave any field blank. Please try again.";
        include 'person_signin.php';
        exit();
    } else {
    $landlord_id = loginPeople($username,$password,102);
    
    if (!empty($landlord_id)){
        $_SESSION['LOGGED_IN']='OK';
        $_SESSION['TYPE']='landlord';
        $_SESSION['LANDLORD_ID'] = $landlord_id;
        $_SESSION['RENTER_ID'] = null;
        $_SESSION['USERNAME'] = $username;

        include 'person_menu_landlord.php';
        exit();
    } else
    {
        $message = "Login failed. Please try again.";
        include 'person_signin.php';
        exit();
    }
}
}

if($_SESSION['TYPE'] == 'renter' && isset($_GET['renter_menu'])) {
    include 'person_menu_renter.php';
    exit();
}


//if all else fails
include 'person_signin.php';
exit();






?>

