<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $con = mysqli_connect("localhost","u571439899_infopillar","InfoPillar@123","u571439899_InfoPillar");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to Connect to MySQL: " . mysqli_connect_error();
    }
?>
