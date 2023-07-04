<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resend Email</title>
</head>
<body>
    
</body>
</html>

<?php


    if(isset($_GET['username'])){
        
        require 'db.php';
        $username = $_GET['username'];

        $username = stripcslashes($username);

        $token_query = "select fname,email,token from developers where username='$username'";

        $rows = $con->query($token_query)->fetch_assoc();

        $token = $rows['token'];
        $fname = $rows['fname'];
        $email = $rows['email'];
        $role = "evs";
        $subject  = "Email Verification From Emailer";
        $message = "
                <div style='background-color:aquamarine;text-color:black;text-align:center;'>
                    <h2>Hii ".$fname." !! Click The Button For Email Verification </h2><a href='https://infopillarsolution.com/Emailer/verifyemail.php?token=".$token."'><button style='background-color:aquamarine;text-color:white;'>Verify Email</button></a>
                </div>
            ";

        include 'sendmail.php';
        ?>
        <script>window.location.href = "signin.php"</script>
        <?php
    }else{
        ?>
        <script>window.location.href = "signin.php"</script>
        <?php
    }
?>