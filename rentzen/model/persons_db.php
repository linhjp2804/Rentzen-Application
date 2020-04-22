<?php

function loginPeople($username,$password,$role){
    //returns true if the username and password are a good match.  false if not
    global $db;
    $sql = 'select people_id FROM people '
            . 'WHERE username = ? and password = ? and role_id = ?';
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$username);
    $statement->bindValue(2,$password);
    $statement->bindValue(3,$role);
    $statement->execute();
    $array = $statement->fetch();// fetchall give two dimensions, this is only one record so use fetch.
    $statement->closeCursor();
    if (empty($array['people_id'])){
        $result = false;
    } else
    {
        $result = $array['people_id'];
    }
    return $result; //result is the people_id of the logged-in user   
}

function addPerson($username, $password, $role) {
    global $db;
    $sql = "INSERT INTO people(username, password, role_id) "
            . "VALUES(?,?,?)";
    $statement=$db->prepare($sql);
    $statement->bindValue(1,$username);
    $statement->bindValue(2,$password);
    $statement->bindValue(3,$role);
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

function profileUpdateRenter ($income, $credit_rating, $firstname, $lastname, $email, $phone, $renter_id) {
    global $db;
    $sql = "UPDATE people SET income = ?, credit_rating = ?, firstname = ?, lastname = ?, username = ?, phone=?  WHERE people_id = ?"; 
    $statement=$db->prepare($sql);
    $statement->bindValue(1,$income);
    $statement->bindValue(2,$credit_rating);
    $statement->bindValue(3,$firstname);
    $statement->bindValue(4,$lastname);
    $statement->bindValue(5,$email);
    $statement->bindValue(6,$phone);
    $statement->bindValue(7,$renter_id);
    $result = $statement->execute();
    $statement->closeCursor();
    return $result;
}

function profileUpdateLandlord ($firstname, $lastname, $email, $phone, $person_id) {
    global $db;
    $sql = "UPDATE people SET firstname = ?, lastname = ?, username = ?, phone=? WHERE people_id = ?"; 
    $statement=$db->prepare($sql);
    $statement->bindValue(1,$firstname);
    $statement->bindValue(2,$lastname);
    $statement->bindValue(3,$email);
    $statement->bindValue(4,$phone);
    $statement->bindValue(5,$person_id);
    $result = $statement->execute();
    $statement->closeCursor();
    return $result;
}

function getPerson($people_id){
    global $db;
    $sql = "SELECT * from people WHERE people_id = ?";
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$people_id);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);//fetch num, fetch both??
    $statement->closeCursor();
    //result is the array of result
    return $result;            
}

