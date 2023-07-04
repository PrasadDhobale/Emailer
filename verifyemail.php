<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <?php
    require 'db.php';
        if(isset($_GET['token'])){
            $token = $_GET['token'];
            
            $chk_evs_query = "select fname,evs from developers where token = '$token'";
            
            $chk_evs = $con -> query($chk_evs_query)->fetch_assoc();

            if($chk_evs!=null){
                if($chk_evs['evs'] == "Active"){
                    echo "<script>alert('".$chk_evs['fname']." Email ID Already Verified')</script>";
                }else{
                    echo "<script>alert('".$chk_evs['fname']." We are Verifying Email ID...')</script>";
                    $update_evs = "update developers set evs = 'Active' where token='$token'";
                    
                    $rows_effected = $con->query($update_evs);

                    if($con->affected_rows > 0){
                        echo  "<script>alert('Email Verified Successfully')</script>";
                    }else{
                        echo "<script>alert('Email Not Verified Try Again')</script>";
                    }
                }
            }else{
                echo "<script>alert('Invalid Developer')</script>";
            }
            echo "<script>window.location.href = 'https://infopillarsolution.com/Emailer/signin.php'</script>";
        }
    ?>
</body>
</html>