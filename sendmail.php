<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "emailer@infopillarsolution.com";
    $to = $email;
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    $headers .= "From:" . $from . "\r\n";
    if(mail($to,$subject,$message, $headers)) {
          if($role == "evs"){
            echo  "<script>alert('Please Verify Your Email From Your Email Inbox')</script>";
            echo "<script>window.location.href= 'http://infopillarsolution.com/Emailer'; </script>";
        }
        if($role == "fp"){
            echo  "<script>alert('Your Password had been sent to your Email')</script>";
            echo "<script>window.location.href= 'http://infopillarsolution.com/Emailer'; </script>";
        }
        if($role == "ret"){
            echo  "<script>alert('Thanks For Contacting $name..!\\nWe Will Contact You Soon.. ')</script>";
        }
    } else {
        echo "<script>alert('Something Went Wrong');</script>";
    }
?>