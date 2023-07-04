<?php

if(isset($_POST['updateprofile'])){

    require '../db.php';
    session_start();

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $username = $_SESSION['username'];

    $update_query = "update developers set fname = '$fname',lname = '$lname',password = '$password' where username = '$username'";
    $resule = $con->query($update_query);
    if($con->affected_rows > 0){
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['password'] = $password;
        $_SESSION['username'] = $username;
        ?>
        <script>
            alert("Profile Updated Successfully");
            window.location.href = "../dashboard.php";
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Something Went Wrong");
        </script>
        <?php
    }

}else{
    ?>
    <script>
        window.location.href = "../index.php";
    </script>
    <?php
}

?>