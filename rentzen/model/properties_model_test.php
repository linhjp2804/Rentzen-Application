<?php
/* this script is for testing purposes only.  */


/*go get variables*/
include '../common/configuration.php';

/*go get a database connection */
include 'database.php';

/*go get the people functions */
include 'properties_db.php';

/*do the tests */
echo "<h1>Testing getStates</h1>";
$states = getStates();
print_r($states);

echo "<h1>Testing getPropertyTypes</h1>";
$property_types = getPropertyTypes();
print_r($property_types);

echo "<h1>Testing getPropertyStatusCodes</h1>";
$propery_status_codes = getPropertyStatusCodes();
print_r($propery_status_codes);

echo "<h1>Testing getFeatures</h1>";
$features = getFeatures();
print_r($features);

echo "<h1>Testing getCities</h1>";
$cities = getCities();
print_r($cities);

echo "<h1>Testing getLandlordProperties</h1>";
$result = getLandlordProperties(902);
print_r($result);

echo "<h1>Testing addProperty</h1>";
$result = addProperty("1216 N Carlisle","Philadelphia",38, 19121, 3, 1,
            1110, 502, 401, 60000, 750, 1500, "Linh house");
if ($result == true){
    echo "It worked. property added. property_id is: " . $result;
}

echo "<h1>Testing for editProperty and getProperty</h1>";

echo "<h2>Testing for editProperty</h2>";
editProperty("1216 N Carlisle 3rd floor","Philadelphia",38, 19121,3,1,
            1110, 502, 401, 80000, 750, 1500, "Linh house",327);
$result = getProperty(327);
print_r($result);

echo "<h1>Testing for marking property status</h1>";

echo "<h2>Testing for markPropertyListed</h2>";
markPropertyListed(327);
$result = getProperty(327);//look at propstat_id at the array to check or check the table
print_r($result);

echo "<h2>Testing for markPropertyVacant</h2>";
markPropertyVacant(328);
$result = getProperty(328);//look at propstat_id at the array to check or check the table
print_r($result);

echo "<h2>Testing for markPropertyOccupied</h2>";
markPropertyOccupied(328);
$result = getProperty(328);//look at propstat_id at the array to check or check the table
print_r($result);

echo "<h1>Testing getPropertyFeatures</h1>";
$result = getPropertyFeatures(301);
print_r($result);

echo "<h1>Testing addPropertyFeatures</h1>";
addPropertyFeatures(201,327);
addPropertyFeatures(202,327);
addPropertyFeatures(203,327);
$result = getPropertyFeatures(327);
print_r($result);

echo "<h1>Testing addRenterProperyRecord</h1>";
addRenterProperyRecord(901,327); //alr check on phpmyadmin. worked

echo "<h1>Testing deleteRenterProperty</h1>";
deleteRenterProperty(30)//delete the record created above. alr check on phpmyadmin. worked
?>

