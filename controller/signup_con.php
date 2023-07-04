<?php

include "../db.php";
    if(isset($_POST['sign_up'])){        
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $emailquery = "select * from developers where email = '$email' or username = '$username'";
        $con->query($emailquery);
        $rows =  $con->affected_rows;
        
        if($rows > 0){
            ?>
            <script>
                alert("Username or Email ID Already Exist")
                window.location.href = "../index.php";
            </script>
            <?php
        }else{
            date_default_timezone_set('Asia/Kolkata'); 
            $dt=date("Y-m-d H:i:s");
            
            $token = openssl_random_pseudo_bytes(16);
            $token = bin2hex($token);

            $insert_query = "insert into developers (fname,lname,email,evs,username,password,token,reg_time) values 
                            ('$fname','$lname','$email','Inactive','$username','$password','$token','$dt')";            

            $iquery = mysqli_query($con,$insert_query);
            if($iquery){
                if($iquery){
                    
                    $role = "evs";
                    $subject  = "Email Verification From Emailer";
                    $message = "
                            <div style='background-color:aquamarine;text-color:black;text-align:center;'>
                                <h2>Hii ".$fname." !! Click The Button For Email Verification </h2><a href='https://infopillarsolution.com/Emailer/verifyemail.php?token=".$token."'><button style='background-color:'aquamarine';text-color:white;'>Verify Email</button></a>
                            </div>
                            ";

                    require '../sendmail.php';

                }else{
                    ?>
                    <script>
                        alert("Oops..Something Went Wrong");
                    </script>
                    <?php
                }
            }else{
                echo "Failed to Insert Record";
            }
        }
        echo "<script>window.location.href = 'https://infopillarsolution.com/Emailer/signin.php'</script>";        
    }
    else{
        ?>
            <script>window.location.href = "../index.php"</script>
        <?php
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emailer</title>
</head>
<body>
    
</body>
</html>