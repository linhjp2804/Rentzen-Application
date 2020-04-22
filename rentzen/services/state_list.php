<?php

header("Expires: " . date('r',time() + 60*60*24));   // 60 x 60 x 24 = 86400 //for cache purpose - this page (serving populating states) will last one day in browser
echo json_encode($data);// take an array, pass it turn into json, and deliver to other locations

?>
