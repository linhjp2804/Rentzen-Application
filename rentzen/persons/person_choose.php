<?php include '../view/header.php';?>

<!--Start container for BS4 (Bootstrap 4) formatting-->
<div class="container-fluid" style="min-height: 600px">
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">    
                <img class="img-fluid rounded" src="<?php echo $base_path?>/images/city.png" alt="city" style="width: 100%">
                <h1>Are you a...</h1>
                    <p></p>
                    <form action="index.php" method="post">
                        <input class="btn btn-primary" aria-label="landlord" type="submit" name="submitAsLandlord" id="land" value="Landlord">
                        <input class="btn btn-primary" aria-label="renter" type="submit" name="submitAsRenter" id="rent" value="Renter">
                    </form>
            </div>   
       </div>
    </div>
</div> <!-- container //-->

<?php include '../view/footer.php';?>



