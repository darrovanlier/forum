<?php

$admin = null;

if(!isset($_SESSION['username'])) {
} elseif ($_SESSION['admin'] == true) {
    $admin = '<li><a href="./adminpanel.php"><i class="fa fa-comments"></i> Admin Panel</a></li>';
}