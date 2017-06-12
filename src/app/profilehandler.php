<?php
include('dbconn.php');

$empty_username_message = null;
$new_username_used = null;
$username_change_message = null;


$fetch_users= $dbh->prepare('Select * from users where username = :username');
$fetch_users->execute([
    ':username' => $_SESSION['username']
]);

if (isset($_POST['update_username'])) {
    $new_username = htmlentities($_POST['new_username']);
    if (!$new_username) {
        $empty_username_message = '<div class="alert alert-danger">Please fill in a new username before clicking the button!</div>';
    } else {
        $check_new_username = $dbh->prepare('select * from users where username = :new_username');
        $check_new_username->execute([
            ':new_username' => $new_username
        ]);
        if ($check_new_username->rowCount() > 0) {
            $new_username_used = '<p class="text-danger">Username is already in use.</p>';
        }  else {
            $update_username = $dbh->prepare('UPDATE users SET username = :username WHERE username = :current_username)');
            $update_username->execute([
                ':username' => preg_replace('/\s+/', '', $new_username),
                ':current_username' => $_SESSION['username']
            ]);
            $username_change_message = '<div class="alert alert-success">Your username has been succesfully updated!</div>';
        }
    }
}

