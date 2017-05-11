<?php
session_start();

include('signup-handler.php');
include('dbconn.php');
?>

<html></html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sign up</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css"  />
</head>
<body>

<div class="signin-form">
    <div class="container text-center">

        <form method="post" class="form-signin">
            <h2 class="form-signin-heading">Sign Up Now!</h2><hr />
            <?= $username_used ?>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Enter Username" maxlength="24"/>
            </div>
            <?= $email_used ?>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Enter E-Mail"/>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter Password"/>
            </div>
            <div class="clearfix"></div><hr />
            <?= $signup_message ?>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="signup">
                    <i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
            <br />
            <label class="text-center">have an account ? <a href="login.php">Sign In</a></label>
        </form>
    </div>
</div>

</div>

</body>
</html>

                  

