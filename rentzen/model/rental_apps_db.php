<?php
function getRentalAppStatusCodes (){
    global $db;
    $statement = $db->prepare('SELECT `app_status_id`,`app_status_name` FROM `rental_app_status`');
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result;
}

function addApp($renter_id, $property_id, $move_in_date,$renter_message){
    global $db;
    $sql = "INSERT INTO renter_property (`renter_id`,`property_id`) "
            . "VALUES (?,?)";
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$renter_id);
    $statement->bindValue(2,$property_id);
    $result= $statement->execute();
        if($result == true){
        $last_id = $db->lastInsertId();
        $sql = "INSERT INTO rental_application (renter_id, property_id, renterproperty_id, last_status_id, move_in_date, renter_message)"
                . "VALUES (?,?,?,1,?,?) ";
        $statement = $db->prepare($sql);
        $statement->bindValue(1,$renter_id);
        $statement->bindValue(2,$property_id);
        $statement->bindValue(3,$last_id);
        $statement->bindValue(4,$move_in_date);
        $statement->bindValue(5,$renter_message);
        $result = $statement->execute();
        
    } else
    {
        $result = false;
    };
    
    $statement->closeCursor();
    //result is true on success, false on error
    return $result;        
    
} 
function getRentalApps ($landlord_id){ //for landlord
    global $db;
    $sql= "Select * 
        FROM `rental_application`, `landlord_property`, `rental_app_status`         
        Where `landlord_property`.`property_id` = `rental_application`.`property_id`
        AND `rental_application`.`last_status_id` = `rental_app_status`.`app_status_id`
        AND `app_status_name` = 'submitted'
        AND `landlord_id` = '?'";
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$landlord_id);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;            
} 
            
function getRentalAppsRenter ($renter_id){ //for renters
    global $db;
    $sql = "SELECT firstname, lastname, phone, rental_application_id,
            property.street, rental_fee,
            app_status_name
        FROM `rental_application`, `rental_app_status`, `renter_property`, `property`, `landlord_property`, `people` 
        WHERE `property`.property_id=`renter_property`.property_id 
        AND `renter_property`.renterproperty_id =`rental_application`.renterproperty_id
        AND `rental_application`.`last_status_id`=`rental_app_status`.app_status_id 
        AND `property`.property_id= `landlord_property`.property_id
        AND `landlord_property`.landlord_id = `people`.people_id
        AND `renter_property`.renter_id = ?";
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$renter_id);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result; 
        };

 function getRentalApp ($rental_application_id) {
    global $db;
    $sql = "SELECT *
        FROM `rental_application`, `rental_app_status`, `renter_property`, `property`, `landlord_property`, `people` 
        WHERE `property`.property_id=`renter_property`.property_id 
        AND `renter_property`.renterproperty_id =`rental_application`.renterproperty_id
        AND `rental_application`.`last_status_id`=`rental_app_status`.app_status_id 
        AND `property`.property_id= `landlord_property`.property_id
        AND `renter_property`.renter_id = `people`.people_id
        AND rental_application_id =?
        ";
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$rental_application_id);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result; 
        };
        
?>