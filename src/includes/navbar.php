<?php
session_start();
include('dbconn.php');

$admin = null;
$id = null;

if(!isset($_SESSION['username'])) {
} elseif ($_SESSION['admin'] == true) {
    $admin = '<li><a href="./adminpanel.php"><i class="fa fa-comments"></i> Admin Panel</a></li>';
}



?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css"  />
    <title>welcome
        <?php
        if(isset($_SESSION['username'])) {
            echo ' - ';
            echo $_SESSION['username'];
        }
        ?></title>
</head>
<body>

<section class="container">
    <section class="row clearfix">
        <section class="col-md-12 column">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php"><i class="fa fa-comments"></i>Home</a></li>
                            <?= $admin ?>
                            <?php
                            if(!isset($_SESSION['username'])) {
                                echo "<li><a href=\"login.php\"><i class=\"fa fa-comments\"></i>Login</a></li>";
                                echo "<li><a href=\"signup.php\"><i class=\"fa fa-comments\"></i>Sign-Up</a></li>";
                            } else {
                                echo "</ul>";
                                echo "<ul class=\"nav navbar-nav navbar-right\">";
                                echo "<li class=\"dropdown\">";
                                echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">";
                                echo "<span class=\"glyphicon glyphicon-user\"></span>&nbsp; Account &nbsp;<span class=\"caret\"></span></a>";
                                echo "<ul class=\"dropdown-menu\">";
                                echo "<li><a href=\"profile.php\"><span class=\"glyphicon glyphicon-user\"></span>&nbsp;View Profile</a></li>";
                                echo "<li><a href=\"logout.php?logout=true\"><span class=\"glyphicon glyphicon-log-out\"></span>&nbsp;Sign Out</a></li>";
                                echo "</ul>";
                                echo "</li>";
                                echo "</ul>";
                            }
                            ?>

                    </div> <!-- /.navbar-collapse -->
                </div>
            </nav>