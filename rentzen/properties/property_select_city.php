<?php include '../common/configuration.php'?>
<?php include '../view/header.php'?>

<html>
    <form action="/index.php?search">
        <select class="form-control" id="city" name='city'>
            <option value=''>Please choose</option>
            <!-- <?php foreach($searchedcity as $ct){
                $city_name = $ct['city'];
                echo "<option value='$city_name'> $city_name </option>";
            }
            ?> -->
        </select>
    </form>
</html>
<?php include '../view/footer.php'?>