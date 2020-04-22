<?php include '../view/header.php';?>
<script>
    "use strict";
    $(document).ready(function(){// annonymous function in lynda 
        
        //go get states codes
         $.getJSON("../services/index.php?states",function(states){
            for (var i = 0; i<states.length; i++){
                console.log(states[i]["state_name"]);
                var the_option_tag = "<option value = '" + states[i]["state_id"] +"'>" + states[i]["state_name"] + "</option>";
                $("#state").append(the_option_tag);
            } // end loop
        }); //end get states
        
        //what to do on form submit
        $("#addproperty").submit(function(e){
            
            $("#errors").html("");
            
            var street = $('#street').val();
            street = street.trim();
            
            var city = $('#city').val();
            city = city.trim();
            
            var state = $('#state').val();
            state = state.trim();
            
            var zip = $('#zip').val();
            zip = zip.trim();
            
            var bed = $('#bed').val();
            bed = bed.trim();
            
            var bath = $('#bath').val();
            bath = bath.trim();
            
            var sqft = $('#sqft').val();
            sqft = sqft.trim();
            
            var property_type = $('#property_type').val();
            property_type = property_type.trim();//drrop down list, no need
            
            var occ = $('#occ').val();
            occ = occ.trim();
            
            var income = $('#income').val();
            income = income.trim();
            
            var credit = $('#credit').val();
            credit = credit.trim();
            
            var rent = $('#rent').val();
            rent = rent.trim();
            
            var description = $('#description').val();
            description = description.trim();
            
            if (street == ''){
                $("#errors").append("<li>Street is required.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            }
            
            if (city == ''){
                $("#errors").append("<li>City is required.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            }
            if (state == ''){
                $("#errors").append("<li>State is required.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            }
            if (zip == ''){
                $("#errors").append("<li>Zip is required.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            }
            
             if (zip != "" && zip.length != 5 || isNaN(zip)){
                $("#errors").append("<li>Zip is not valid.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            }
            
            if (bed == ''){
                $("#errors").append("<li>Bed is required.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            }
            
            if (isNaN(bed) || bed<0 || bed>200){
                $("#errors").append("<li>Bed is invalid.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            }
            
            if (bath == ''){
                $("#errors").append("<li>Bath is required.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            }
            if (sqft == ''){
                $("#errors").append("<li>Square Foot is required.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            }
            if (property_type == ''){
                $("#errors").append("<li>Property Type is required.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            }
            if (occ == ''){
                $("#errors").append("<li>Occupation is required.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            }
            if (income == ''){
                $("#errors").append("<li>Income is required.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            }
            if (credit == ''){
                $("#errors").append("<li>Credit is required.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            }
             if (isNaN(credit) || credit <300 || credit>850){
                $("#errors").append("<li>Credit is invalid.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            }           
            if (rent == ''){
                $("#errors").append("<li>Rent is required.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            }
            if (description == ''){
                $("#errors").append("<li>Description is required.</li>");
                e.preventDefault();
                $("#errors").addClass("alert-danger");
            }
        }); //ed submit event
    }); //end ready event
</script>

<!--Start container for BS4 (Bootstrap 4) formatting-->
<div class="container-fluid" style="min-height: 600px;">
        
<!--row for Page Title-->
<div class ="row">
<div class="col-md-auto" align="left"><h2>Add a Property</h2></div>
</div>
<br>

<form  action='index.php' method="post" id="addproperty">
    
 <!--row for Street Address--> 
 <div class="row" >
    <div class="col-sm-4" >
        <label for="street">Street Address:</label>
        <input type="text" class="form-control" id="street" name="street">
    </div>
    <div class="col-sm-4">
        <label for="city">City:</label>
        <input type="text" class="form-control" id="city" name="city">
    </div>
    <div class="col-sm-2">
        <label for="state">State:</label>
        <select class="form-control" id="state" name='state'>
            <option value=''>Please choose</option>
            <!-- <?php foreach($states as $st){
                $state_name = $st['state_name'];
                $state_id = $st['state_id'];
                echo "<option value='$state_id'> $state_name </option>";
            }
            ?> -->
        </select>
    </div>
    <div class="col-sm-2">
        <label for="zip">Zip:</label>
        <input type="text" class="form-control" id="zip" name="zip">
    </div>
 </div> <!-- end row -->
 
 <br>
 
<!-- Attributes-->
<div class='row form-group'>
    
 <div class="form-group column col-md-12">
    <div class='row form-group'>
        <label for="bed" class='col-md-3 col-form-label'>Number of Bedrooms:</label>
        <div class ='col-md-5'>   
        <input type="text" class="form-control" id="bed" name="bed">
        </div>
    </div>
    <div class='row form-group'>
     <label for="bath" class='col-md-3 col-form-label'>Number of Baths:</label>
    <div class="col-md-5">
        <input type="text" class="form-control" id="bath" name="bath">
    </div>
    </div>
    <div class='row form-group'>
    <label for="sqft" class='col-md-3 col-form-label'>Square Footage:</label>
    <div class='col-md-5'>
        <input type="text" class="form-control" id="sqft" name="sqft">
    </div> 
    </div>
    <div class="row form-group"> 
        <label for="property_type" class='col-md-3 col-form-label'>Type of Property:</label>
        <div class='col-md-5'>   
        <select class="form-control" id="property_type" name="type">
               <option value=''>Please choose</option>
                <?php foreach($property_types as $pt){
                    $pt_name = $pt['typename'];
                    $pt_id = $pt['propertytype_id'];
                    echo "<option value='$pt_id'> $pt_name </option>";
                }
                ?>
        </select>
       </div>
    </div>
     <div class="row form-group"> 
     <label for="occ" class='col-md-3 col-form-label'>Occupancy:</label>
     <div class='col-md-5'>   
     <select class="form-control" id="occ" name='occ'>
            <option value=''>Please choose</option>
            <option value="401">Vacant</option>
            <option value="402">Occupied</option>
            <option value="403">Listed</option>
     </select>
    </div>
    </div>
    <div class="row form-group"> 
     <label for="income" class='col-md-3 col-form-label'>Income Requirement:</label>
     <div class='col-md-5'>   
     <input type="text" class="form-control" id="income" name='income'>
    </div>
    </div>
     <div class="row form-group"> 
     <label for="credit" class='col-md-3 col-form-label'>Credit Score Requirement:</label>
     <div class='col-md-5'>   
     <input type="text" class="form-control" id="credit" name='credit'>
    </div>
    </div>
     <div class="row form-group"> 
     <label for="rent" class='col-md-3 col-form-label'>Rental Fee:</label>
     <div class='col-md-5'>   
     <input type="text" class="form-control" id="rent" name='rent'>
    </div>
    </div>
    <div class="row form-group"> 
        <label for="description" class='col-md-3 col-form-label'>Description:</label>
        <div class='col-md-5'>   
            <textarea rows="5" class="form-control" id="description" name='description'></textarea>
        </div>
    </div>
 </div>

 </div>

<div class="text-center"><button type="submit" name= "addproperty" class="btn btn-primary">Submit</button>
</div>

 <div class="row">
    <div class="col-md-12 text-center">
        <div id="message"><?php echo $message; ?></div>
    </div>
</div>  
 <div class="row">
    <div class="col-md-12">
        <ul id="errors"></ul>
    </div>
</div>

 </form>

</div> <!-- container //-->


<?php include '../view/footer.php';?>