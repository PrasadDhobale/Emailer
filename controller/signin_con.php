<?php
    if(isset($_POST['signin'])){
        
        session_start();

        require "../db.php";   
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  

        $check_user_query = "select *from developers where username = '$username' and password = '$password'";

        $row = $con->query($check_user_query)->fetch_assoc();

        if($username == $row['username'] && $password == $row['password']){

            $chk_evs = $con -> query($check_user_query)->fetch_assoc();
            
            if($chk_evs['evs'] == "Active"){
                $_SESSION['username'] = $username;
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['token'] = $row['token'];
                header('Location: ../dashboard.php');
            }else{
                $_SESSION['evs'] = "Inactive";
                $_SESSION['username'] = $username;
                ?>
                <script>window.location.href = "../signin.php"</script>
                <?php
            }
        }else{
            ?>
            <script>alert('Invalid Username or Password')
                window.location.href = '../signin.php';
                </script>
            <?php
        }
    }
    else{
        ?>
            <script>window.location.href = "../index.php"</script>
        <?php
    }
?>