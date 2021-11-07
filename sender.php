<?php

use PHPMailer\PHPMailer\PHPMailer;


    if(isset($_POST['sendmail'])){
        
        
        $message = $_POST['message'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $role = $_POST['role'];
        
        $body = $message;
        
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
    
        $mail = new PHPMailer();
    
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "services.propad@gmail.com";
        $mail->Password = 'Propad@1234';
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl"; //tls
    
        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email);
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->header = $subject;    
    
        echo $role."\t".$email."\t".$subject."\t".$body;
        if ($mail->send()) {
            if($role == "evs"){
                echo  "<script>alert('Please Verify Your Email From Your Email Inbox')</script>";
                echo "<script>window.location.href= 'http://infopillarsolution.com/Emailer'; </script>";
            }
            if($role == "fp"){
                echo  "<script>alert('Your Password had been sent to your Email')</script>";
                // echo "<script>window.location.href= 'http://infopillarsolution.com/Emailer'; </script>";
            }
            if($role == "ret"){
                $url = $_POST['url'];
                echo  "<script>alert('Thanks For Contacting ..!\\nWe Will Contact You Soon.. ')</script>";
                // echo "<script>window.location.href= '$url'; </script>";
            }
        } else {
            echo "<script>alert('Something Went Wrong <?php echo $mail->ErrorInfo; ?>');</script>";
            // echo "<script>window.location.href= 'http://infopillarsolution.com/Emailer'; </script>";
        }
    }
    //echo "<script>window.location.href= 'http://infopillarsolution.com/Emailer'; </script>";
?>