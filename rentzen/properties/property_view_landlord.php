<?php include '../view/header.php';?>

<div class ="container" id="mycontainer">
    <div class="row">
        <h2>Property on <?php echo ucwords($property_info['street']);?><br></h2>
    </div>
    <div class='row'>
            <div class='col-md-1'></div>
            <div class='col-md-4'>
                <img class='img-fluid rounded' src='<?php echo $property_info['picture_url'];?>' alt='No Image Available' style='max-width: 100%'>
            </div>
            <div class='col-md-6'>
            <b>Description:  </b>
            <p><?php echo $property_info['description'];?></p>
            <b>City:  </b>
            <p><?php echo $property_info['city'];?></p>
            <b>Beds:  </b>
            <p><?php echo $property_info['beds'];?></p>
            <b>Baths:  </b>
            <p><?php echo $property_info['baths'];?></p>
`           <b>Square Feet:  </b>
            <p><?php echo $property_info['sqft'];?></p>
            <b>Monthly Rent:  </b>
            <p><?php echo $property_info['rental_fee'];?></p>
            <a href='index.php?manage' class='btn btn-default'>Back to Properties</a>
            </div>
            <div class='col-md-1'></div>

    </div>
     
</div><!--close the container-->    

<?php include '../view/footer.php'?>
