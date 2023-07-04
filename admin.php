<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Emailer | Admin</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <a href="index.php"><button class="btn btn-primary">Home</button></a>
    <?php
        if(isset($_POST['admin']) && $_POST['uname'] == "emailer" && $_POST['pass'] == "emailer@123"){
            include "db.php";
            $rows = $con->query("select *from developers");
                ?>
                <table class="container-sm table table-responsive-sm">
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                    </tr>
                    <?php  
                    while($row = $rows->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['fname'],"\t", $row['lname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
                <?php
        }else{
    ?>
    <form action="#" method = "post" class="form text-center">
        <h2><u>Admin Login</u></h2>
        <input type="text" name="uname" class="form-control mb-5" placeholder="Enter Username" required>
        <input type="password" name="pass" class="form-control mb-5" placeholder="Enter Password" required>
        <button class="btn btn-primary mt-5" name="admin" value="admin">Login</button>
    </form>
    
    <?php
        }
    ?>
</body>
</html>