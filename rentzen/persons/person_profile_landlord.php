<?php include '../view/header.php';?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h1>Update Landlord Profile</h1>
            <form method="POST" action="index.php" id="profileupdateL">
                <div class="form-group row">
                  <label for="un" class="col-md-3 col-form-label">Username</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="un" placeholder="Username" name="usernameprofile" value="<?php echo $user_info['username'];?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="pw" class="col-md-3 col-form-label">Password</label>
                  <div class="col-md-6">
                    <input type="password" class="form-control" id="pw" placeholder="Password" name="passwordprofile" value="<?php echo $user_info['password'];?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="fn" class="col-md-3 col-form-label">First Name</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="fn" placeholder="First Name" name="firstnameprofile" value="<?php echo $user_info['firstname'];?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="ln" class="col-md-3 col-form-label">Last Name</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="ln" placeholder="Last Name" value="<?php echo $user_info['lastname'];?>" name="lastnameprofile">
                  </div>
                </div> 

                <div class="form-group row">
                    <label for="inputPhone" class="col-md-3 col-form-label">Phone Number</label>
                    <div class="col-md-6">
                      <input type="tel" class="form-control" id="inputPhone" placeholder="Phone" name="phoneprofile" value="<?php echo $user_info['phone'];?>">
                    </div>
                </div>
                     
                     
                <div class="text-center">    
                    <button type="submit" name="profileupdateL" class="btn btn-primary" id="submitprofileL">Update Profile</button> 
                </div>
            </form>
            <div id="message">
                <?php echo $message;?>
            </div>
    </div> <!--close col-md-8-->
</div>
 

<?php include '../view/footer.php'; ?>