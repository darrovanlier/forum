<?php
session_start();
include('dbconn.php');
include('login-handler.php');


//if(!isset($_SESSION['username'])) {
//} elseif ($_SESSION['user'] == true) {
//    $user = '<li><a href="#">userpanel</a></li>';
//} else {
//    $user = null;
//}

if(!isset($_SESSION['username'])) {
} elseif ($_SESSION['admin'] == true) {
    $admin = '<li><a href="#">adminpanelpanel</a></li>';
} else {
    $admin = null;
}



?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css"  />
    <title>welcome - <?= $_SESSION['username'] ?></title>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Welcome  </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>

                <?php
                if(!isset($_SESSION['username'])) {
                    echo "<li><a href='login.php'>Login</a></li>
                            <li><a href='signup.php'>Sign-Up</a></li>";
                } else {
                    echo "<li><a href=\"#\">userpanel</a></li>";
                }
                ?>
                <?= $admin ?>
            </ul>
            <?php
            if(!isset($_SESSION['username'])) {
            } else {
                echo "            
            <ul class=\"nav navbar-nav navbar-right\">
                <li class=\"dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        <span class=\"glyphicon glyphicon-user\"></span>&nbsp; Account &nbsp;<span class=\"caret\"></span></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"profile.php\"><span class=\"glyphicon glyphicon-user\"></span>&nbsp;View Profile</a></li>
                        <li><a href=\"logout.php?logout=true\"><span class=\"glyphicon glyphicon-log-out\"></span>&nbsp;Sign Out</a></li>
                    </ul>
                </li>
            </ul>";
            }
            ?>

        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="clearfix"></div>

<div class="container-fluid" style="margin-top:50px;">
    <div class="container">
        <hr />
        <div class="rechts">
            <form method="post">
                <div class="form-signin">
                    <input type="text" class="form-control" name="txt_title" placeholder="Title Of Your post"/>
                </div>

                <div class="form-signin">
                    <input type="text" class="form-control" name="txt_inhoud" placeholder="Post"/>
                </div>  <br>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-danger" name="#">
                        Submit Post
                    </button>
                </div>
                <br />
            </form>
        </div>

        <div class="links>">

        </div>
    </div>
</div>


<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>