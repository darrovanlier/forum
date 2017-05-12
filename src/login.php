<?php
session_start();
if(isset($_SESSION['username'])) {
    header('Location: index.php');
    exit(0);
}
include('dbconn.php');
include('login-handler.php');
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css"  />
</head>
<body>

<div class="signin-form">
    <div class="container text-center">
        <form class="form-signin" method="post" id="login-form">
            <h2 class="form-signin-heading">Log In Now!</h2><hr />
            <?= $login_message ?>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Enter Username" required />
                <span id="check-e"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter Password" />
            </div>
            <hr />
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-default">
                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
                </button>
            </div>
            <label>Don't have account yet ? <a href="signup.php">Sign Up</a></label> <br>
            <label><a href="index.php">Home</a></label>
        </form>
    </div>
</div>
</body>
</html>



</body>
</html>