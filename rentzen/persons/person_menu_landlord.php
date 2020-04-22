<?php include '../view/header.php'?>



<!--Start container for BS4 (Bootstrap 4) formatting-->
<div class="container-fluid" style="min-height: 600px">

    <div class="row text-center">
        <div class="col-md-12">
        <h2 class="text-center">Landlord Dashboard</h2>
        </div>
    </div>

    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active"><b>Properties</b></a>
                    <a href="../rental_applications/index.php?list" class="list-group-item list-group-item-action">Manage Rental Applications<i class="fa fa-angle-double-right pull-right"></i></a>
                    <a href="../properties/index.php?prop_add" class="list-group-item list-group-item-action">Add a property<i class="fa fa-angle-double-right pull-right"></i></a>
                    <a href="../properties/index.php?manage" class="list-group-item list-group-item-action">Manage Properties<i class="fa fa-angle-double-right pull-right"></i></a>
                    <br>
                    <a href="#" class="list-group-item list-group-item-action active"> <b>Account</b></a>
                    <a href="index.php?profile" class="list-group-item list-group-item-action">Update Profile<i class="fa fa-angle-double-right pull-right"></i></a>
                    <a href="index.php?logout" class="list-group-item list-group-item-action">Log Out<i class="fa fa-angle-double-right pull-right"></i></a><br>
                    
                    <a href="#" class="list-group-item list-group-item-action active"><b>Other menus</b></a>
                    <a href="../site_info/index.php?help" class="list-group-item list-group-item-action">Help<i class="fa fa-angle-double-right pull-right"></i></a>
                    <a href="../site_info/index.php?about" class="list-group-item list-group-item-action">About Us<i class="fa fa-angle-double-right pull-right"></i></a>
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