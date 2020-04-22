<?php include '../view/header.php';?>

<script>
    "use strict"; //best practice
    
    $(document).ready(function(){
        $('#streetview').click(function(){
            var location = $('#location').val();
            var streetviewurl = "https://maps.googleapis.com/maps/api/streetview?size=600x400&location="+location+"&key=AIzaSyBkYy3QdqyYgHr8_jUiX8WEePPE5DGIQy8";
            console.log(streetviewurl);  
            $('#streetviewimage').attr('src',streetviewurl);
        })//end street view click
        $('#googlemap').click(function(){
            var location = $('#location').val();
            var mapurl = "https://maps.googleapis.com/maps/api/staticmap?center="+location+"&markers="+location+"&zoom=17&size=400x400&key=AIzaSyBkYy3QdqyYgHr8_jUiX8WEePPE5DGIQy8";
            console.log(mapurl);
            $('#mapimage').attr('src',mapurl);
        })//end google map
    }); //end doc ready
</script>
<div></div>   

<div class ="container" id="mycontainer">
    <div class="row">
        <h2>Property on <?php echo ucwords($property_info['street']);?></h2>
    </div>
    
<div class="row">
    <div class="col-md-1"></div>
    <div class='col-md-4'>
        <img class='img-fluid rounded' src='<?php echo $property_info['picture_url'];?>'  style='max-width: 100%'>
        <br></br> 
        <img id="streetviewimage" class='img-fluid rounded' src='' style='max-width: 100%'>
        <br></br> 
        <img id="mapimage" class='img-fluid rounded' src='' style='max-width: 100%'>
        <br></br> 
    </div>

    <div class="col-md-6">
            <b>Description:  </b>
            <p><?php echo $property_info['description'];?></p>
            <b>City:  </b>
            <p><?php echo $property_info['city'];?></p>
            <b>Beds:  </b>
            <p><?php echo $property_info['beds'];?></p>
            <b>Baths:  </b>
            <p><?php echo $property_info['baths'];?></p>
            <b>Square Feet:  </b>
            <p><?php echo $property_info['sqft'];?></p>
            <b>Monthly Rent:  </b>
            <p><?php echo $property_info['rental_fee'];?></p>

    </div>
</div>
 
    <div class="row">
        <div class="col-md-12 text-center">
            <form action="../rental_applications/index.php" method="post">`
                <div id="buttons">
                <input class="btn btn-primary btn-block" type="submit" value="Apply" name="APPLY"> 
                <input type="hidden" value="<?php echo $selected_property_id;?>" name="property_id">
                <br>
                <input class="btn btn-info btn-block" type="button" value="Google Street View" name="STREETVIEW" id='streetview'>  
                <input id = "location" type="hidden" value="<?php echo $location;?>">
                <br>
                <input class="btn btn-secondary btn-block" type="button" value="Google Map" name="GOOGLEMAP" id='googlemap'>  
                <br>
                </div>
            </form>
        </div>
    </div>
</div>        
<br>

<?php include '../view/footer.php'?>
