<?php
session_start();
include('dbconn.php');
include('includes/whenlogged.php');
include('app/themehandler.php');


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

<section class="container">
    <section class="row clearfix">
        <section class="col-md-12 column">

            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><Forum></Forum></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php"><i class="fa fa-comments"></i>Home</a></li>
                            <?= $admin ?>
                            <?php
                            if(!isset($_SESSION['username'])) {
                                echo "<li><a href=\"login.php\"><i class=\"fa fa-comments\"></i>Login</a></li>
                            <li><a href=\"signup.php\"><i class=\"fa fa-comments\"></i>Sign-Up</a></li>";
                            } else {
                                echo "<li><a href=\"#\">Userpanel</a></li>";
                                echo "    </ul>          
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

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>


            <div class="container">
                <h2 class="text-center">Topics</h2>
                <table class="table table-striped table-bordered table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created by</th>
                        <th>Replies</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                        if ($fetch_topics->rowCount() > 0) {
                            $rows = $fetch_topics->fetchAll();
                            foreach ($rows as $row) {
                                $id = $row['id'];
                                echo '<td><a href="replies.php?id='.$id.'">'.$row['title'].'</td>';
                                echo '<td>'.$row['context'].'</td>';
                                echo '<td>'.$row['user_id'].' '.$row['created_at'].' </td>';
                                echo '<td>Replies count</td>';
                                echo '</tr>';
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>

        </section>
    </section>
</section>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>