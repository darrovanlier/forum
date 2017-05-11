<?php

include('dbconn.php');

$login_message = null;
$user = null;
$admin = null;

if (isset($_POST['login'])) {

    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);

    if (!$username || !$password) {
        $login_message = '<div class="alert alert-danger" role="alert">Please fill in an username and password.</div>';
    } else {

        $login_query = $dbh->prepare('select * from users where password = :password and username = :username');
        $login_query->execute([
            ':password' => hash('sha512', $password),
            ':username' => preg_replace('/\s+/', '', $username)
        ]);

        if ($login_query->rowCount() > 0) {
            $row = $login_query->fetch();
            $_SESSION['username'] = $row['username'];
            $_SESSION['admin'] = $row['admin'];
            $_SESSION['user'] = $row['user'];
            header('Location: index.php');
            exit(0);
        } else {
            $login_message = '<div class="alert alert-danger" role="alert">Incorrect username and password.</div>';
        }

    }

}