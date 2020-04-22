<?php include '../view/header.php'; ?>


<div class ="container" id="mycontainer">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Rental Application for <?php echo ucwords($app_view['street']);?><br></h2>
        </div>
    </div>

<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-4">
        <img class='img-fluid rounded' src='<?php echo $app_view['picture_url'];?>' style='max-width: 100%'>
    </div>
    <div class="col-md-6">
                <b>Status</b>
                <p class="alert alert-info"><?php echo ucwords($app_view['app_status_name']);?></p>
                <b>Applicant</b>
                <p><?php echo $app_view['firstname']." ".$app_view['lastname'];?></p>
               <b>Income</b>
                <p>$<?php echo $app_view['income'];?></p>
                <b>Credit Score</b>
                <p><?php echo $app_view['credit_rating'];?></p>
                <b>Move-in Date</b>
                <p><?php echo $app_view['move_in_date'];?></p>
                <b>Phone Number</b>
                <p><?php echo $app_view['phone'];?></p>
                <b>Email</b>
                <p><?php echo $app_view['username'];?></p>
                <b>Message</b>
                <p><?php echo $app_view['renter_message'];?></p>
    </div>
    <div class="col-md-1">
    </div>

</div>
    
    <div class="row">

        <div class="col-md-1"></div>
        <div class="col-md-10">
            <a class="btn btn-info btn-block" href='<?php echo $base_path;?>/rental_applications?view_apps'>Back to Applications</a>
        </div>

        <div class="col-md-1"></div>
    </div>

</div>
       
<?php include '../view/footer.php'; ?>
