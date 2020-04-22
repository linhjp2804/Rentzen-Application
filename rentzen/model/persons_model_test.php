<?php
/* this script is for testing purposes only.  */


/*go get variables*/
include '../common/configuration.php';

/*go get a database connection */
include 'database.php';

/*go get the people functions */
include 'persons_db.php';

/*do the tests */
echo "<h1>Testing loginPeople</h1>";

echo "<h2>Renter</h2>";
echo loginPeople("esmith@email.com","esmith123",101);

echo "<h2>Landlord</h2>";
echo loginPeople("ajones@email.com","ajones123",102);

echo "<h2>Test for login failure</h2>";
if (loginPeople("ajones@email.com","bad-bad-bad-password",102) == false) 
    {
    echo "OK.  Expected result.";
    }

echo "<h1>Testing addPerson (Renter)</h1>";
$outcome_r = addPerson("tommy@test.com","password123",101);
if ($outcome_r == true){
    echo "It worked. Person of type renter added. Id number is: " . $outcome_r;
}

echo "<h1>Testing addPerson (Landlord)</h1>";
$outcome_l = addPerson("tommy@test.com","password123",102);
if ($outcome_l == true){
    echo "It worked. Person of type landlord added. Id number is: " . $outcome_l;
}

echo "<h1>Testing profileUpdateRenter and getPerson</h1>";
profileUpdateRenter(49000,444,'Bill','TheRenter','bill@zzz.com','2155551212',929);

//we can use print_r to dump out an array
$person_array = getPerson(929);
print_r($person_array);

echo "<h1>Testing profileUpdateRenter and getPerson</h1>";
profileUpdateLandlord('Suzy','TheLandlord','bill@zzz.com','2155551212',929);

//we can use print_r to dump out an array --TAKE A LOOK AT THISSSSS
$person_array = getPerson(929);
print_r($person_array);

?>