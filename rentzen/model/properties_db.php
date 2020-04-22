<?php
//get properties for renter
function getProperties ($city) {
    global $db;
    $sql = 'SELECT * FROM property WHERE CITY LIKE ? AND PROPSTAT_ID = 403';
    $statement = $db->prepare($sql);
    $statement->bindValue(1, $city);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;   
}

// get States 
function getStates(){
    global $db;
    $statement = $db->prepare('select * from state order by state_name');
    $statement->execute();
    $states = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $states; 
}
// get property types
function getPropertyTypes(){
    global $db;
    $statement = $db->prepare('SELECT * FROM `property_type` order by typename');
    $statement->execute();
    $propery_types = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $propery_types;
}

// get property status codes
function getPropertyStatusCodes(){
    global $db;
    $statement = $db->prepare('SELECT `propstat_id`,`propertystat` FROM `property_status`');
    $statement->execute();
    $propery_status_codes = $statement->fetchAll();
    $statement->closeCursor();
    return $propery_status_codes;
}

//get features
function getFeatures(){
    global $db;
    $statement = $db->prepare('SELECT `feature_id`,`feature_name`,`description` FROM `feature`');
    $statement->execute();
    $features = $statement->fetchAll();
    $statement->closeCursor();
    return $features;
}

//get Cities:
function getCities(){
    global $db;
    $statement = $db->prepare('SELECT distinct city FROM property order by city');
    $statement->execute();
    $cities = $statement->fetchAll();
    $statement->closeCursor();
    return $cities;
}

//get Zip:
function getZips(){
    global $db;
    $statement = $db->prepare('SELECT distinct zip FROM property order by zip');
    $statement->execute();
    $zips = $statement->fetchAll();
    $statement->closeCursor();
    return $zips;
}

//get landlord properties:
function getLandlordProperties($landlord_id){
    global $db;
    $sql = "SELECT * FROM  `people`, `landlord_property`, `property`, `property_status`
WHERE people.people_id = landlord_property.landlord_id 
AND landlord_property.property_id = property.property_id 
AND property.propstat_id = property_status.propstat_id
AND people.people_id = ? ORDER BY property.property_id DESC";
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$landlord_id);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;            
}

//add property
function addProperty($street, $city, $state_id, $zip, $beds, $baths,
            $sqft, $type_id, $propstat_id, $income_requirement, $credit_requirement, 
            $rental_fee, $description, $landlord_id) {
    global $db;
    $sql = "INSERT INTO property (street, city, state_id, zip, beds, baths,
            sqft, type_id, propstat_id, income_requirement, credit_requirement, 
            rental_fee, description)"
            . "VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $statement=$db->prepare($sql);
    $statement->bindValue(1,$street);
    $statement->bindValue(2,$city);
    $statement->bindValue(3,$state_id);
    $statement->bindValue(4,$zip);
    $statement->bindValue(5,$beds);
    $statement->bindValue(6,$baths);
    $statement->bindValue(7,$sqft);
    $statement->bindValue(8,$type_id);
    $statement->bindValue(9,$propstat_id);
    $statement->bindValue(10,$income_requirement);
    $statement->bindValue(11,$credit_requirement);
    $statement->bindValue(12,$rental_fee);
    $statement->bindValue(13,$description);
    $result = $statement->execute();
    if ($result == true){
       $last_id = $db->lastInsertId(); //return property_id as the first index column in table
       $sql = "INSERT INTO landlord_property (landlord_id, property_id)"
                . "VALUES (?,?) ";
        $statement = $db->prepare($sql);
        $statement->bindValue(1,$landlord_id);
        $statement->bindValue(2,$last_id);
        $result = $statement->execute();
        
    } else
    {
        $result = false;
    };
    $statement->closeCursor();
    //result is true on success, false on error
    return $result;        
    
}

//edit Property
function editProperty ($street, $city, $state_id, $zip, $beds, $baths,
            $sqft, $type_id, $propstat_id, $income_requirement, $credit_requirement, 
            $rental_fee, $description,$property_id) {
    global $db;
    $sql = "UPDATE property SET street = ?, city = ?, state_id = ?, zip=? , "
            . "beds = ?, baths = ?,sqft = ?, type_id = ?, propstat_id = ?,"
            . "income_requirement = ?, credit_requirement = ?, rental_fee = ?,"
            . "description = ? WHERE property_id = ?"; 
    $statement=$db->prepare($sql);
    $statement->bindValue(1,$street);
    $statement->bindValue(2,$city);
    $statement->bindValue(3,$state_id);
    $statement->bindValue(4,$zip);
    $statement->bindValue(5,$beds);
    $statement->bindValue(6,$baths);
    $statement->bindValue(7,$sqft);
    $statement->bindValue(8,$type_id);
    $statement->bindValue(9,$propstat_id);
    $statement->bindValue(10,$income_requirement);
    $statement->bindValue(11,$credit_requirement);
    $statement->bindValue(12,$rental_fee);
    $statement->bindValue(13,$description);
    $statement->bindValue(14,$property_id);
    $result = $statement->execute();
    $statement->closeCursor();
    return $result;
}

//mark propery listed
function markPropertyListed ($property_id) {
    global $db;
    $sql = "UPDATE property SET propstat_id = 403 WHERE property_id = ?"; 
    $statement=$db->prepare($sql);
    $statement->bindValue(1,$property_id);
    $result = $statement->execute();
    $statement->closeCursor();
    return $result;
}

//get property
function getProperty($property_id){
    global $db;
    $sql = "SELECT property.street, property.city, 
        property.state_id, property.zip, beds, baths, sqft, type_id, 
        propstat_id, income_requirement, rental_fee, description, username,
            firstname, lastname,picture_url
            FROM property, landlord_property, people 
            WHERE property.property_id = ? 
            AND property.property_id = landlord_property.property_id 
            AND landlord_property.landlord_id = people.people_id";
    $statement=$db->prepare($sql);
    $statement->bindValue(1,$property_id);
    $statement->execute();
    $property=$statement->fetch();
    $statement->closeCursor();
    return $property;
}

//mark property vacant
function markPropertyVacant ($property_id) {
    global $db;
    $sql = "UPDATE property SET propstat_id = 401 WHERE property_id = ?"; 
    $statement=$db->prepare($sql);
    $statement->bindValue(1,$property_id);
    $result = $statement->execute();
    $statement->closeCursor();
    return $result;
}

//mark property occupied
function markPropertyOccupied ($property_id) {
    global $db;
    $sql = "UPDATE property SET propstat_id = 402 WHERE property_id = ?"; 
    $statement=$db->prepare($sql);
    $statement->bindValue(1,$property_id);
    $result = $statement->execute();
    $statement->closeCursor();
    return $result;
}

// get property features
function getPropertyFeatures($property_id){
    global $db;
    $sql = "SELECT feature_name from `feature`, `property_feature`
        Where `feature`.`feature_id` = `property_feature`.`feature_id`
        AND property_id = ?"; 
    $statement=$db->prepare($sql);
    $statement->bindValue(1,$property_id);
    $statement->execute();
    $propertyfeatures = $statement->fetchAll();
    $statement->closeCursor();
    return $propertyfeatures;
}

//add propety features
function addPropertyFeatures($feature_id, $property_id) {
    global $db;
    $sql = "INSERT INTO property_feature(feature_id, property_id) "
            . "VALUES(?,?)";
    $statement=$db->prepare($sql);
    $statement->bindValue(1,$feature_id);
    $statement->bindValue(2,$property_id);
    if ($statement->execute()){
       $result = $db->lastInsertId(); 
    } else
    {
        $result = false;
    };
    $statement->closeCursor();
    //result is people_id on success, false on error
    return $result;
}

//add renter property record
function addRenterProperyRecord($renter_id, $property_id){
    global $db;
    $sql = "Insert into renter_property (renter_id, property_id) values (?,?)";
    $statement=$db->prepare($sql);
    $statement->bindValue(1,$renter_id);
    $statement->bindValue(2,$property_id);
    $return = $statement->execute();  
    $statement->closeCursor();
    return $return;
}

//delete Renter Property
function deleteRenterProperty($renterproperty_id){
    global $db;
    $sql = "delete from renter_property where renterproperty_id = ?";
    $statement=$db->prepare($sql);
    $statement->bindValue(1,$renterproperty_id);
    $result = $statement->execute();
    $statement->closeCursor();
    return $result;
}
?>
