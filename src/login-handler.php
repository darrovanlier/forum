<?php

include('dbconn.php');

$login_message = null;

if (isset($_POST['login'])) {
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);

    if (!$username || !$password) {
        $login_message = '<div class="alert alert-danger">Please fill in all fields</div>';
    } else {
        $login_q = $dbh->prepare('select * from users where password = :password and username = :username');
        $login_q->execute([
            ':password' => hash('sha512', $password),
            ':username' => preg_replace('/\s+/', '', $username)
        ]);

        if ($login_q->rowCount() > 0) {
            $row = $login_q->fetch();
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['admin'] = $row['admin'];

            header('Location: index.php');
            exit(0);
        } else {
            $login_message = '<div class="alert alert-danger">Wrong username or password.</div>';
        }
    }
}