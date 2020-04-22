<!DOCTYPE html>
<html lang="en-us">
<head>
    <title>RentZen</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 References -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- Link to FontAwesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Your custom CSS -->
    <link rel="stylesheet" href="<?php echo $base_path;?>/css/rentzen.css"> <!--put base_path here-->
    
    <!-- Link to image for the favicon -->
    <link rel="icon" href="<?php echo $base_path;?>/images/favicon.png"> <!--put base_path here-->
</head>

<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
    <!-- Logo -->
      <a class ="navbar-brand" aria-label="Home Page" href="<?php echo $base_path;?>/index.php">
          <img alt="RentZen Logo" src="<?php echo $base_path;?>/images/favicon.png" style="width:40px;">
      </a>

    <!-- Toggler Icon for responsiveness -->
    <button aria-label="toggler-icon" id="toggle-icon" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <!--Menu sets on the left-->
        <ul class="navbar-nav mr-auto">
        </ul>
    <!--Menu sets on the right-->    
    <?php if (isset($_SESSION['LOGGED_IN'])){
        $type = $_SESSION['TYPE'];
        $username = $_SESSION['USERNAME'];
        echo "<ul class='navbar-nav ml-auto'>
            <li class='nav-item'>
                <a class='nav-link' href='$base_path/persons/index.php?profile'><i class='fa fa-user-o' aria-hidden='true'></i> Hello, $username</a>
                </li>
                <li class='nav-item'>
                <a class='nav-link' href='$base_path/persons/index.php?logout'><i class='fa fa-sign-in' aria-hidden='true'></i> Sign Out</a>
                </li>
                </ul>";
    } 
    else {echo "<ul class='navbar-nav ml-auto'>

                <li class='nav-item'>
                <a class='nav-link' href='$base_path/persons/index.php?signup'><i class='fa fa-user-o' aria-hidden='true'></i> Sign Up</a>
                </li>
                <li class='nav-item'>
                <a class='nav-link' href='$base_path/persons/index.php?signin'><i class='fa fa-sign-in' aria-hidden='true'></i> Sign In</a>
                </li>
        </ul>";} ?>
    </div>  
</nav>
        
<br><br><br><br>
 
    
