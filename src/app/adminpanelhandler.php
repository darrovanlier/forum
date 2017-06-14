<?php
$delete_user_msg = null;
$admin_user_msg = null;
$remove_admin_user_msg = null;
$check_theme_title_taken = null;
$empty_field_theme_error = null;

$fetch_all_users= $dbh->prepare('Select * from users');
$fetch_all_users->execute([
]);

if (isset($_POST['delete_user'])) {
    $id = $_POST['adminpanel_user_id'];
    $username = $_POST['adminpanel_user_name'];
    $deleteuser = $dbh->prepare('delete from users where id = :id');
    $deleteuser->execute([
        ':id' => $id
    ]);

    $delete_topic_deleted_user = $dbh->prepare('delete from topics where author = :username');
    $delete_topic_deleted_user->execute([
        ':username' => $username
    ]);

    $delete_reply_deleted_user = $dbh->prepare('delete from replies where author = :username');
    $delete_reply_deleted_user->execute([
        ':username' => $username
    ]);

    $delete_user_msg = '<div class="alert alert-danger mt-3" role="alert">User, and all his/her/appache helicopter\'s posts and replies has been deleted! <a href="adminpanel.php">refresh</a></div>';
}

if (isset($_POST['admin_user'])) {
    $id = $_POST['adminpanel_user_id'];
    $admin_user = $dbh->prepare('UPDATE users SET admin = 1 where id = :id');
    $admin_user->execute([
        ':id' => $id
    ]);
    $admin_user_msg = '<div class="alert alert-success mt-3" role="alert">User has been made admin! <a href="adminpanel.php">refresh</a></div>';
}

if (isset($_POST['remove_admin_user'])) {
    $id = $_POST['adminpanel_user_id'];
    $admin_user = $dbh->prepare('UPDATE users SET admin = 0 where id = :id');
    $admin_user->execute([
        ':id' => $id
    ]);
    $remove_admin_user_msg = '<div class="alert alert-success mt-3" role="alert">Admin has been made a user again, what an loser <a href="adminpanel.php">refresh</a></div>';
}


if (isset($_POST['make_new_theme'])) {
    $author = $_SESSION['username'];
    $theme_title = htmlentities($_POST['new_theme_title']);
    $theme_description = htmlentities($_POST['new_theme_description']);


    $check_theme_title = $dbh->prepare('select * from themes where title = :title');
    $check_theme_title->execute([
        ':title' => $theme_title,
    ]);

    if ($check_theme_title->rowCount() > 0) {
        $check_theme_title_taken = '<p class="text-danger">Theme title already exists</p>';
    }   else {
            if (!$theme_title || !$theme_description) {
                $empty_field_theme_error = '<p class="text-danger">Please enter some text before submitting!</p>';
            } else {
                $create_new_theme = $dbh->prepare('insert into themes (author, description, title) values (:author, :description, :title)');
                $create_new_theme->execute([
                    ':author' => $author,
                    ':description' => $theme_description,
                    ':title' => $theme_title

                ]);
                header("Location: index.php");

            }
        }
}