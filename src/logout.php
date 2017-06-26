<?php
session_start();
include ('helpers/helper.php');

if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
}

if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
}

if (isset($_SESSION['admin'])) {
    unset($_SESSION['admin']);
}

session_destroy();

header('Location: '. url("forum/src/index.php"));
exit(0);