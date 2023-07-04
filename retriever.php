<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/Emailer.png">
    <title>Emailer | Retriever</title>
</head>
<body>

<?php
    if(isset($_POST['submit'])){

        require 'db.php';

        $token = $_GET['token'];
        $name = $_POST['name'];
        $cemail = $_POST['email'];
        $csubject = $_POST['subject'];
        $message = $_POST['message'];
        $url = $_POST['url'];

        $chk_token = "select *from developers where token = '$token'";

        $rows = $con->query($chk_token);
        
        $rows = $rows->fetch_assoc();

        $role = "ret";
        $email = $rows['email'];
        $fname = $rows['fname'];
        $subject = "$name Contacted You From Your Website";
        $message = 'Hii '.$fname.'..!!<br><br>Details Of the Contacted Person.<br><br>Name : '. $name. '<br>Email : '. $cemail. '<br>Subject : '. $csubject. '<br>Message : '. $message. '<br><br><br>This Contact Form is Of : '. $url;
        
        require 'sendmail.php';

        ?>
        <script>window.location.href = "<?php echo $url ?>";</script>
        <?php
    }else{
        ?>
        <script>window.location.href = "index.php";</script>
        <?php
    }
?>
</body>
</html>