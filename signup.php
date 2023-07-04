<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Emailer | Sign up</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/signup.css">
  <link rel="icon" href="assets/img/Emailer.png">
</head>
<body>
<a href="index.php"><button class="btn btn-lg btn-primary align-left"><i class="fa fa-arrow-left"></i></button></a>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
            <img src="assets/img/Emailer.png" alt="" width="370px" height="300px">
          </div>
          <div class="card-body p-4 p-sm-5">
            <h1 class="text-center text-primary">E-Mailer</h1>
            <h5 class="card-title text-center mb-5 fw-light fs-5">Create an Account here</h5>
            <form action="controller/signup_con.php" method="post">
              

              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="fname" id="floatingfname" placeholder="First Name" required autofocus>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="lname" id="floatinglname" placeholder="Last Name" required autofocus>
              </div>

              <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="floatingInputEmail" placeholder="Email ID" required autofocus>
                <p class="alert text-info">You've to Verify It Email Later</p>
                <hr>
              </div>              
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" id="floatingInputUsername" placeholder="Username" required autofocus>
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="floatingPasswordConfirm" placeholder="Password" required autofocus>
              </div>
              <div class="d-grid mb-2">
                <button class="btn  btn-primary btn-login fw-bold text-uppercase" name="sign_up" type="submit">Sign Up</button>
              </div>

              <a class="d-block text-center mt-2 medium" href="signin.php">Have an account? Sign In</a>

              <hr class="my-4">

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>