<?php

    if(isset($_POST['forgot_password'])){
        
        require '../db.php';
        

        $email = $_POST['email'];

        $chk_email = "select *from developers where email = '$email'";
        
        $rows = mysqli_query($con,$chk_email);
        $rows = $rows -> fetch_assoc();

        if($rows['email'] == $email){
            
            session_start();
            
            $username = $rows['username'];
            $password = $rows['password'];
            $fname = $rows['fname'];
            $_SESSION['username'] = $username;
            
            
            if($rows['evs'] == "Active"){
                $role = "fp";
                $subject  = "Forgot Password [ Emailer ]";
                $message = "
                        <div style='background-color:aquamarine;text-color:black;text-align:center;'>
                            <h2>Hii ".$fname." !! <br></h2>
                            <p>You are Requested For Password of Your Emailer Account<br>Your Password Is : </p>

                            <button style='background-color:aqua;text-color:white;'>$password</button>
                        </div>
                    ";
                require "../sendmail.php";
                ?>
                <script>window.location.href = "../signin.php";</script>
                <?php    
            }else{
                $_SESSION['evs'] = "Inactive";
                ?>
                <script>window.location.href = "../forgotpassword.php";</script>
                <?php    
            }
        }else{
            ?>
            <script>alert("Email Address Not Registered With Us..!!")
                window.location.href = "../signin.php";
            </script>
            <?php
        }
    }else{
        ?>
            <script>window.location.href = "../index.php";</script>
        <?php
    }
?>