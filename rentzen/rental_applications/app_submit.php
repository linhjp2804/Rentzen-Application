<?php include '../view/header.php'?>
<script>
    "use strict"
    $(document).ready(function(){
        $("#app_submit_form").submit(function(e){
            
            $("#errors").html("");
            
            var moveIn = $('#movein').val();
            moveIn = moveIn.trim();
            
            var message = $('#renter_message').val();
            message = message.trim();
                    
            if (moveIn === ''){
                $("#errors").append("<li>Move in Date is required.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            };

            if (message === ''){
                $("#errors").append("<li>Message to landlord is required.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            };
        });
    });
</script>
<div class="text-center">
<h1>Rental Application</h1>
</div>
<div class='container'>
    <div class='row justify-content-md-center'>
        
    <div class="col-md-auto"></div>
    <div class="col-md-8">

        <!--Form with read-only fields-->
        <form method="post" action="index.php" id="app_submit_form">
        
        <h3>Property: <?php echo $property_info['street'];?></h3>
    <div class="row">
        <div class='col text-center'>
            <img class="img-fluid" src="<?php echo $property_info['picture_url'];?>" alt="house" style="max-width: 100%">
        <input type='hidden' value="<?php echo $property_id;?>" name="property_id">
        </div>
    </div>
            <p></p>

        <div class="form-group row">
            <label for="renter_name" class="col-md-4 col-form-label">Landlord name</label>
            <div class="col-md-8">
                <input type="text" readonly="" class="form-control" id="renter_name" placeholder="" value="<?php echo $property_info['firstname']." ".$property_info['lastname'] ;?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="CreditRating" class="col-md-4 col-form-label">Email Address</label>
            <div class="col-md-8">
            <input type="text" readonly class="form-control" id="Email" placeholder="Not Specified" value="<?php echo $property_info['username'];?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="movein" class="col-md-4 col-form-label">Move in Date</label>
            <div class="col-md-8">
            <input type="date" class="form-control" id="movein" name="movein">
            </div>
        </div>
        <div class="form-group row">
            <label for="renter_message" class="col-md-4 col-form-label">Message to landlord</label>
            <div class="col-md-8">
                <textarea class="form-control" rows="4" id="renter_message" name="renter_message"></textarea>
            
            </div>
        </div>

        
        <h3> Your information </h3>
        <div class="form-group row">
            <label for="renter_name" class="col-md-4 col-form-label">Your name</label>
            <div class="col-md-8">
                <input type="text" readonly="" class="form-control" id="renter_name" name="renter_name" placeholder="" value="<?php echo $renter_info['firstname']." ".$renter_info['lastname'] ;?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="creditrating" class="col-md-4 col-form-label">Credit Score</label>
            <div class="col-md-8">
            <input type="text" readonly class="form-control" id="creditrating" name="creditrating" placeholder="" value="<?php echo $renter_info['credit_rating'];?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="income" class="col-md-4 col-form-label">Income</label>
            <div class="col-md-8">
            <input type="text" readonly class="form-control" id="income" name="income" placeholder="" value="<?php echo $renter_info['credit_rating'];?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label">Phone number</label>
            <div class="col-md-8">
                <input type="text" readonly class="form-control" id="phone"  name="phone" placeholder="xxx-xxx-xxx" value="<?php echo $renter_info['phone'];?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label">Email</label>
            <div class="col-md-8">
            <input type="email" readonly class="form-control" id="email"  name="email" placeholder="" value="<?php echo $renter_info['username'];?>">
            </div>
        </div>
        <div class="text-center">You can update your profile <a href="<?php echo $base_path;?>/persons?profile">here</a></div><br>

        
            <!--Button-->
        <div id="buttons" class="text-center">
            <!--<label>&nbsp;</label>-->
            <input type="submit" aria-label="submit_button" class="btn btn-primary" value="Submit Rental Application" name="SUBMIT"><br>
        </div>
        
        <div id="message"><?php echo $message;?></div>
        </form>
    </div>
    <div class="col-md-auto"></div>
     <div class="row">
    <div class="col-md-12">
        <ul id="errors"></ul>
    </div>
</div>

</div>
    <br>
</div>
<?php include '../view/footer.php'?>