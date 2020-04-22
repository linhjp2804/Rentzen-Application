<?php include '../view/header.php';?>
<div class="text-center">
    <img class="img-fluid rounded" src="../images/city.png" alt="city" style='width: 100%'>
    <p></p>
    <h1>Find your home</h1>
    <small>Only listed properties can be found here.</small>
</div>

<div class="row justify-content-md-center"> <!--Variable width content BS4-->
    
    <div class="col-md-3"></div>
    <div class="col-md-auto">
    <form method="POST" action="index.php" id="form2">
    <br>
        <div class="form-group">
            <label for="city">City </label><br>
            <input type="text" class="form-control" id="city" name="city" list="cities" >
            <datalist id="cities">
                <?php foreach ($cities as $c) {
                    echo "<option>" . $c['city'] . "</option>";
                } ?>
                <option></option>
            </datalist>
        </div>
        <div id="button" class="text-center">
            <button class="btn btn-primary" name="submit-search">Search</button>
        </div>
    </form>
    </div>
    <div class="col-md-3"></div>

</div><br>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="text-center" id="message"><?php echo $message;?></div>
    </div>
    <div class="col-md-2"></div>
</div>
<?php include '../view/footer.php'?>