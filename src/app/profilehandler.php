<?php
include('dbconn.php');

$fetch_users= $dbh->prepare('Select * from users where username = :username');
$fetch_users->execute([
    ':username' => $_SESSION['username']
]);

$empty_email_message = null;
$new_email_used = null;
$email_change_message = null;

$empty_password_message = null;
$password_change_message = null;

$update_email = null;

if (isset($_POST['update_email'])) {
    $new_email = htmlentities($_POST['new_email']);

    if (!$new_email) {
        $empty_email_message = '<div class="alert alert-danger">Please fill in a new email before clicking the button!</div>';
    } else {
        $check_new_email = $dbh->prepare('select * from users where email = :new_email');
        $check_new_email->execute([
            ':new_email' => $new_email
        ]);
        if ($check_new_email->rowCount() > 0) {
            $new_email_used = '<p class="alert alert-danger">Email is already in use.</p>';
        }  else {
            $update_email = $dbh->prepare('UPDATE users SET email = :new_email WHERE username = :current_username');
            $update_email->execute([
                ':new_email' => $new_email,
                ':current_username' => $_SESSION['username']
            ]);
            $email_change_message = '<div class="alert alert-success">Your email has been succesfully updated!</div>';
        }
    }
}

if (isset($_POST['update_password'])) {
    $new_password = htmlentities($_POST['new_password']);

    if (!$new_password) {
        $empty_password_message = '<div class="alert alert-danger">Please fill in a new password before clicking the button!</div>';
    }   else {
            $update_password = $dbh->prepare('UPDATE users SET password = :new_password WHERE username = :current_username');
            $update_password->execute([
                ':new_password' => hash('sha512', $new_password),
                ':current_username' => $_SESSION['username']
            ]);
            $password_change_message = '<div class="alert alert-success">Your password has been succesfully updated!</div>';
        }
    }



