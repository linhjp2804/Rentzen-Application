<?php include '../view/header.php'?>



<!--Start container for BS4 (Bootstrap 4) formatting-->
<div class="container-fluid" style="min-height: 600px">

    <div class="row text-center">
        <div class="col-md-12">
        <h2 class="text-center">Renter Dashboard</h2>
        </div>
    </div>

    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="list-group">
                    <a href="" class="list-group-item list-group-item-action active"><b>Properties</b></a>
                    <a href="<?php echo $base_path;?>/properties?search" class="list-group-item list-group-item-action">Search for Properties<i class="fa fa-angle-double-right pull-right"></i></a>
                    <a href="<?php echo $base_path;?>/rental_applications?view_apps" class="list-group-item list-group-item-action">My Rental Applications<i class="fa fa-angle-double-right pull-right"></i></a>
                    <br>
                    <a href="" class="list-group-item list-group-item-action active"> <b>Account</b></a>
                    <a href="<?php echo $base_path;?>/persons?profile" class="list-group-item list-group-item-action">Update Profile<i class="fa fa-angle-double-right pull-right"></i></a>
                    <a href="<?php echo $base_path;?>/persons?logout" class="list-group-item list-group-item-action">Log Out<i class="fa fa-angle-double-right pull-right"></i></a><br>
                    
                    <a href="" class="list-group-item list-group-item-action active"><b>Other Menus</b></a>
                    <a href="<?php echo $base_path;?>/site_info?help" class="list-group-item list-group-item-action">Help<i class="fa fa-angle-double-right pull-right"></i></a>
                    <a href="<?php echo $base_path;?>/site_info?about" class="list-group-item list-group-item-action">About Us<i class="fa fa-angle-double-right pull-right"></i></a>
                </div>
            </div>
        </div>
        
        </div>
    <div class="col-md-2"></div>
    </div>

<div class="row">
    <div class="col-md-12 text-center">
        <div id="message">
        </div>
    </div>
</div>    

</div> <!-- container //-->

<?php include '../view/footer.php'?>