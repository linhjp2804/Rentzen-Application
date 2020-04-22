<?php include './common/configuration.php';?>
<?php include './view/header.php';?>

<!--Start container for BS4 (Bootstrap 4) formatting-->
<div class="container-fluid" style="min-height: 600px">

<img class="img-fluid rounded" src="images/city.png" alt="Philadelphia Skyline" style="width: 100%">

    <div class="row">
        <div class="col-md-12">
        <br>
        <h2 class="text-center">Welcome to RentZen</h2><br>
        <div class="text-center"><p><b>Our mission?</b> Bring <em>zen</em> to renting.</p>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <p>RentZen provides a digital experience for landlords to find qualified tenants and renters to find the home of their dreams without the hassle of in-person showings. It's an all-in-one platform 
        for renting homes and apartments. RentZen connects landlords and renters 
        via an easy to use platform that reduces in-person visits to properties,
        reviews user qualifications, and streamlines communication between landlords 
        and renters​</p>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="text-center">  
            <a class="btn btn-primary" aria-label="sign_up" href="./persons/index.php?choose">Sign up</a> <!--link to index(controller) not the page itself-->
            <a class="btn btn-primary" aria-label="sign_up" href="./persons/index.php?signin">Sign In</a> 
        </div>
        </div>
    </div>
</div> <!-- container //-->

<?php include './view/footer.php';?>
