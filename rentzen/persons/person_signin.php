<?php include '../view/header.php'; ?>

<!--Start container for BS4 (Bootstrap 4) formatting-->
<div class="container-fluid" style="min-height: 600px">

<div class="row">
    <div class="col text-center">
        <img class="img-fluid rounded" src="<?php echo $base_path;?>/images/city.png" alt="Philadelphia Skyline">
        <h1>Sign In</h1>
    </div>
</div>

<div class="row justify-content-md-center"> <!--Variable width content BS4-->
    <div class="col-md-2"></div>
    <div class="col-md-auto">
        <form style="" action="index.php" method="post" id="form1">
            <div class="form-group" align="left">
                <label for="username">Email</label>
                <input name='username' type="email" class="form-control" placeholder="Email" id="username" value="">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name='password' type="password" class="form-control" placeholder="Password" id="password" value="">
            </div>
        <div class="text-center">
            <button type="submit" name="sign-in-landlord" class="btn btn-primary">Sign in as landlord</button> 
            <button type="submit" name="sign-in-renter" class="btn btn-primary">Sign in as renter</button> 
        </div>
        </form>

    <p class="text-center">Don't have an account? <a href="index.php?choose">Sign Up</a></p>
        

    </div>
    <div class="col-md-2"></div>
</div>
    
<div class="row">
    <div class="col-md-12 text-center">
        <div id="message"><?php echo $message;?></div>
    </div>
</div>  
    
</div> <!-- container //-->




<?php include '../view/footer.php'; ?>
