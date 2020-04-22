<?php
//include all database configuration and functions
include '../view/header.php';
?>
 
   
<div class ="container">
    <div class ='row'>    
        <div class="col-md-1"></div>
        <div class="col-md-4">
        <div class="text-center">
         <h5>Location</h5>
         </div>
        </div>
        <div class="col-md-3">
            <div class="text-center">
            
         <h5>Occupancy</h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="text-center">
            <h5>Action</h5>
            </div>
        </div>        
    </div>
    
  <?php foreach($landproperties as $l):?>
    
    <div class ='row'>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <div class="text-center">
            <p><?php echo $l['street']; ?>, <?php echo $l['city']; ?> </p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="text-center">
        <p><?php echo ucfirst($l['propertystat'])?></p>
            </div>
        </div>
        <div class="col-md-3">
         <form action='../properties/index.php' method='post'> 
            <?php $propid = $l['property_id']?>
            <a class='btn btn-default' href='index.php?lid=<?php echo $propid;?>'>View</a>
            <input type ='hidden' name='propid' id='propid' value='<?php echo $propid;?>'>
            <?php if ($l['propertystat'] != "listed"){
                    echo "<input type='submit' name='list' id='list' class='btn btn-info' value='List Property'>"
                    ;}
                else if ($l['propertystat'] == "listed"){
                    echo "<input type='submit' name='remove' id='remove' class='btn btn-danger' value='Remove Listing'>";
                }
            ?>
            <input type='button' name='edit' id='list' class='btn btn-primary' value='Edit'>
         </form>
        </div>
        <div class="col-md-1"></div>
    </div>
<?php endforeach; ?>
    
   <div class ='row'> 
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <a href="<?php echo $base_path;?>/properties/index.php?prop_add" id="manage" name="manage" class="btn btn-info btn-block">Add a property</a>
        </div>
        <div class="col-md-1"></div> 
   </div>
    
</div> <!-- end container -->

<?php include '../view/footer.php'?>

