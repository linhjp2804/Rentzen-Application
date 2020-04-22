<?php include '../view/header.php'; ?>
<!--Start container for BS4 (Bootstrap 4) formatting-->
<div class="container-fluid" style="min-height: 600px">
<div class="row justify-content-md-center"> <!--Variable width content BS4-->
        
        <div class="col col-md-3"></div>
        <div class="col-md-6"> <!--variable width content-->
        <h2 class="text-center"> Renter Sign up</h2>
        <form action="index.php" method="post" id="form1">

        <div>
            <div class="form-group">
                <label for="username">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="usernameR" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="passwordR" id="password">
            </div>
        </div>

        <div id="buttons" class="text-center">
            <input class="btn btn-primary" type="submit" value="Sign up" name="confirmationR"><br>
        </div>

            <div id="message"><?php echo $message; ?></div> 
        </form>    
        </div>
        
        <div class="col col-md-3"></div>

    </div>    
</div> <!-- container //-->
<?php include '../view/footer.php';?>