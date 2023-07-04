<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emailer | Dashboard</title>
    <link rel="icon" href="assets/img/Emailer.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['username'])){
    ?>
    <div class="card">
        <div class="card-body">        
            <div class="text-end">
                <div class="dropdown">
                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION['username']; ?> <i class="fa fa-user"></i>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profileModal">Profile</a></li>
                        <hr>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateModal">Update Profile</a></li>
                        <hr>
                        <li><a class="dropdown-item" href="#">Documentation</a></li>
                        <hr>
                        <li><a class="dropdown-item" href="signout.php">Sign Out</a></li>
                    </ul>
                </div>
            </div>

            <div class="modal" id="profileModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table responsive-sm">
                            <tr>
                                <th>Full Name</th>
                                <td>: <?php echo $_SESSION['fname']; ?>&emsp14;<?php echo $_SESSION['lname']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>: <?php echo $_SESSION['email']; ?></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>: <?php echo $_SESSION['username']; ?></td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td>: <?php echo $_SESSION['password']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-lg btn-primary" data-bs-dismiss="modal">Ok</button>
                    </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="updateModal" tabindex="-1">
                <div class="modal-dialog modal-lg">

                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="controller/update_profile_con.php" method="POST">
                        <div class="modal-body">
                            <table class="table responsive-sm">
                                <tr>
                                    <div class="input-group mb3">
                                        <span class="input-group-text" id="basic-addon1">First Name</span>
                                        <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $_SESSION['fname']; ?>">
                                    </div>
                                </tr>
                                <hr>
                                <tr>
                                    <div class="input-group mb3">
                                        <span class="input-group-text" id="basic-addon1">Last Name</span>
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php echo $_SESSION['lname']; ?>">
                                    </div>
                                </tr>
                                <hr>
                                <tr>
                                    <div class="input-group mb3">
                                        <span class="input-group-text" id="basic-addon1">Password</span>
                                        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $_SESSION['password']; ?>">
                                    </div>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>: <?php echo $_SESSION['email']; ?></td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td>: <?php echo $_SESSION['username']; ?></td>
                                </tr>                                
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="updateprofile" value="updateprofile" class="btn btn-lg btn-primary" data-bs-dismiss="modal">Update</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <div class="dashboard">
                <h1 class="text-center text-primary pt-5 pb-5"><u>Welcome <?php echo $_SESSION['username']; ?></u></h1>
                <div class="container">
                    <h2>Instructions : </h2>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Create Your Contact Form.</li>
                        <li class="list-group-item"><input type="text" class="text-primary form-control" readonly id="tokenlink" value="https://infopillarsolution.com/Emailer/retriever.php?token=<?php echo $_SESSION['token']; ?>">
                            <button class="btn btn-primary">Copy the Link</button><br>
                            and paste it to your form <b>action</b>
                        </li>
                        <li class="list-group-item">Contact Form <b>method</b> should be <b>"POST"</b>.</li>

                        <li class="list-group-item">Contact Form <b>id</b> should be <b>"Emailer"</b>.</li>                        
                        
                        <li class="list-group-item">Contact Form should contain <b>"Full Name, Email, Subject and Message"</b>input fields.</li>

                        <li class="list-group-item"><b>name</b> of your input field must be - <b>name, email, subject, message.</b></li>
                        
                        <li class="list-group-item">Your Submit button's <b>name</b> should be <b>"submit"</b> and <b>value</b> should be <b>"Send"</b></li>

                        <li class="list-group-item">
                            <textarea rows="5" cols="50" class="text-primary form-control" readonly id="script">
                                var _0x6f114a=_0x56e4;(function(_0x112ba4,_0xce885){var _0x2d87cd=_0x56e4,_0x8b04f=_0x112ba4();while(!![]){try{var _0x55cf29=-parseInt(_0x2d87cd(0xe0))/0x1*(parseInt(_0x2d87cd(0xd0))/0x2)+-parseInt(_0x2d87cd(0xd7))/0x3*(parseInt(_0x2d87cd(0xd3))/0x4)+parseInt(_0x2d87cd(0xd8))/0x5+parseInt(_0x2d87cd(0xd1))/0x6+parseInt(_0x2d87cd(0xdf))/0x7*(-parseInt(_0x2d87cd(0xdc))/0x8)+parseInt(_0x2d87cd(0xda))/0x9+-parseInt(_0x2d87cd(0xd6))/0xa*(-parseInt(_0x2d87cd(0xe1))/0xb);if(_0x55cf29===_0xce885)break;else _0x8b04f['push'](_0x8b04f['shift']());}catch(_0x24c7d7){_0x8b04f['push'](_0x8b04f['shift']());}}}(_0x1999,0x2f220));function _0x1999(){var _0x42bf36=['URL','351104tToYJL','887256lmxdzo','input','48356ggYFNF','hidden','getElementById','178130rmWchi','30XqZDzD','159445OOkHSj','url','2181537MpnFeM','setAttribute','24WUDvmL','appendChild','name','383201SfYJTV','1bsZqEr','143DkLwbp','Emailer'];_0x1999=function(){return _0x42bf36;};return _0x1999();}function _0x56e4(_0x31752e,_0x2db002){var _0x1999e3=_0x1999();return _0x56e4=function(_0x56e4c7,_0x69da2b){_0x56e4c7=_0x56e4c7-0xcf;var _0x45897a=_0x1999e3[_0x56e4c7];return _0x45897a;},_0x56e4(_0x31752e,_0x2db002);}var form=document[_0x6f114a(0xd5)](_0x6f114a(0xe2)),input=document['createElement'](_0x6f114a(0xd2));input[_0x6f114a(0xdb)]('type','text'),input['setAttribute'](_0x6f114a(0xde),_0x6f114a(0xd9)),input[_0x6f114a(0xdb)]('value',document[_0x6f114a(0xcf)]),input[_0x6f114a(0xdb)](_0x6f114a(0xd4),'true'),form[_0x6f114a(0xdd)](input);
                            </textarea>
                            <br>
                            <a target="__blank" class="text-decoration-none text-primary" href="http://infopillarsolution.com/Emailer/url.js">Go to : infopillarsolution.com/Emailer/url.js</a>
                            <br>
                            <button class="btn btn-primary">Copy the Script</button><br>
                            and paste it after <b>"&lt;/body&gt;"</b> in <b>&lt;script&gt;&lt;/script&gt;</b>.</b>
                        </li>

                        <li class="list-group-item">Your Contact Form Should be like this
                            <img src="assets/img/instructions/demo_contact_form.PNG" alt="Demo Contact form" width="100%" height="100%">
                        </li>
                        <li class="list-group-item">If any Query ? feel free to contact us at 
                            <a href="https://wa.me/+919067404012?text=Hello%20Prasad%20!!%20I%20Found%20You%20at%20Emailer..!!" target="__blank">What's app</a>
                        </li>                        
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php
    }else{
        ?><script>window.location.href = "index.php";</script>
        <?php
    }
    ?>
</body>
</html>