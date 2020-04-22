<?php include '../view/header.php'; ?>

<div class ="container" id="mycontainer">
    <div class="row">
        <h2>My Rental Applications <br></h2>
    </div>

    <div class="container" id="rental_applications_list">
        <div class ='row'>    
        <div class="col-md-1 text-center"></div>
        <div class="col-md-2 text-center">
         <h5>Property</h5>
        </div>
        <div class="col-md-2 text-center">
        <h5>Landlord</h5>
        </div>
        <div class="col-md-2 text-center">
        <h5>Rental Fee</h5>
        </div>
        <div class="col-md-2 text-center">
         <h5>Status</h5>
        </div>
        <div class="col-md-2 text-center">
         <h5>Action</h5>
        </div>
        </div>
    
    <?php if (empty($rental_applications)){?>
        <div class="row">
        <div class='col-md-12 text-center alert alert-info'>You have no applications. Let's go <a href="../properties/index.php?search">find some properties!</div>
        </div>
    <?php }; //end if ?>
        
    <?php foreach($rental_applications as $r){  ?>        
        
            <div class="row">
            <div class="col-md-1 text-center"></div>
            <div class="col-md-2 text-center"><?php echo ucwords($r['street']);?></div>
            <div class="col-md-2 text-center"><?php echo $r['firstname'] . ' ' . $r['lastname'];?></div>
            <div class="col-md-2 text-center"><?php echo $r['rental_fee'];?></div>
            <div class="col-md-2 text-center"><?php echo ucwords($r['app_status_name']);?></div>
            <div class="col-md-2">
                <a class="btn btn-default" href="index.php?rental_app_id=<?php echo $r['rental_application_id'];?>">View</a>
            </div>
            </div><br>
            
    <?php } //end foreach ?>
    </div>
    </div>
    

</div>
<?php include '../view/footer.php'; ?>