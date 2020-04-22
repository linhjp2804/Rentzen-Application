  <?php
include '../common/configuration.php';
include '../model/database.php';
include '../model/properties_db.php';
include '../model/persons_db.php';
include '../model/rental_apps_db.php';

session_start();
$message = "";
$property_types = getPropertyTypes();
$cities = getCities();

//get out all session variables
if (!isset($_SESSION['USERNAME'])){ 
$_SESSION['USERNAME'] = null;
$_SESSION['RENTER_ID'] = null;
$_SESSION['LANDLORD_ID'] = null;
} else {
    $username = $_SESSION['USERNAME'];
    $renter_id = $_SESSION['RENTER_ID']; //take renter_id out of session and put in variable
    $landlord_id = $_SESSION['LANDLORD_ID'];
}

//FILTER_INPUT
    $street = filter_input(INPUT_POST,'street');
    $city = filter_input(INPUT_POST,'city');
     $state = filter_input(INPUT_POST,'state');
     $zip = filter_input(INPUT_POST,'zip');
     $beds= filter_input(INPUT_POST,'bed', FILTER_VALIDATE_FLOAT);
     $baths= filter_input(INPUT_POST,'bath', FILTER_VALIDATE_FLOAT);
     $sqft= filter_input(INPUT_POST,'sqft', FILTER_VALIDATE_FLOAT);
     $type_id= filter_input(INPUT_POST,'type', FILTER_VALIDATE_INT);
     $occupancy= filter_input(INPUT_POST,'occ', FILTER_VALIDATE_INT); //propstat_id
     $income= filter_input(INPUT_POST,'income', FILTER_VALIDATE_FLOAT);
     $credit= filter_input(INPUT_POST,'credit', FILTER_VALIDATE_FLOAT);
     $rentalfee= filter_input(INPUT_POST,'rent', FILTER_VALIDATE_FLOAT);
     $description= filter_input(INPUT_POST,'description');
     $property_id= filter_input(INPUT_POST,'property_id', FILTER_VALIDATE_INT);
     
     
// if the list token was not provided, go back to the landing page
if (!isset($_SESSION['LOGGED_IN'])){
    header('../index.php');
    exit();
}


// if the logout button was clicked....
if (isset($_POST['btn_logout'])){
    header('Location: ../persons/person_logout.php');
    exit();
}

//Section B: Landlord

if ($_SESSION['TYPE'] == 'landlord' && isset($_GET['prop_add'])){
    include 'property_add.php';
    exit();
}
if ($_SESSION['TYPE'] == 'landlord' && isset($_POST['property_add'])){
    include('property_add.php');}

if ($_SESSION['TYPE'] == 'landlord' && isset($_POST['addproperty'])){
    if (!empty($street)  && !empty($city) && !empty($state)& !empty($zip)& !empty($beds)& !empty($baths)& !empty($sqft)& !empty($type_id)& !empty($occupancy)& !empty($income)& !empty($credit)& !empty($rentalfee) && !empty($description)){ 
         addProperty($street, $city, $state, $zip, $beds, $baths, $sqft, $type_id, $occupancy, $income, $credit, $rentalfee, $description, $landlord_id);
        $landproperties = getLandlordProperties($landlord_id);
        include 'property_list_landlord.php';
        exit();
    } else {
        $message = "<div class='alert alert-danger'>Submit failed. Please check fields and try again</div>";
         include ('property_add.php');
         exit();
        }
}


if ($_SESSION['TYPE'] == 'landlord' && isset($_GET['manage'])){
    $landproperties = getLandlordProperties($landlord_id);
    include 'property_list_landlord.php';
    exit();
}
    
if ($_SESSION['TYPE'] == 'landlord' && isset($_POST['list'])){
    $property_id = filter_input(INPUT_POST,'propid');
    markPropertyListed ($property_id);
    $landproperties = getLandlordProperties($landlord_id);
    include 'property_list_landlord.php';
    exit();    
}
if ($_SESSION['TYPE'] == 'landlord' && isset($_POST['remove'])){
    $property_id = filter_input(INPUT_POST,'propid');
    markPropertyVacant ($property_id);
    $landproperties = getLandlordProperties($landlord_id);// need to match on view (echo)
    include 'property_list_landlord.php';
    exit();    
}
         

$property_id = filter_input(INPUT_GET,'lid',FILTER_VALIDATE_INT);
if ($_SESSION['TYPE'] == 'landlord'){
    $property_info = getProperty($property_id);
    include 'property_view_landlord.php';
    exit();
}



// Section C: Renter
if (($_SESSION['TYPE']=='renter') && isset($_GET['search'])){
    include'property_search.php';
    exit();
}

if (($_SESSION['TYPE']=='renter') && isset($_POST['submit-search'])){
    if (empty ($city)){
        $message = "<div class='alert alert-danger'>Please choose a city.</div>";
        include 'property_search.php';
        exit();
    }
    else if (count(getProperties($city))==0){
        $message = "<div class='alert alert-danger'>There are no listed properties in this city</div>";
        include 'property_search.php';
        exit();
    }
    else{
        $searchedprop = getProperties($city);
        include 'property_list.php';
        exit();
    }
}

$selected_property_id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT); //id here match with id token in the property_list.php
if (($_SESSION['TYPE'] == 'renter') && (!empty($selected_property_id))){
    $property_info = getProperty($selected_property_id);
    $location = $property_info['street'].''.$property_info['city'].''.$property_info['street'].''.$property_info['state_name'].''.$property_info['zip'];
    // $property2 = getPropertyInfo($selected_property_id);
    include 'property_view.php';
    exit();
}


?>

