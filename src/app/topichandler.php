<?php

$content_error = null;
$create_reply_msg = null;
$reply_content_taken = null;

$fetch_thread = $dbh->prepare('select * from topics where id = :id');
$fetch_thread->execute([
    ':id' => $_GET['id']
]);

$fetch_replies = $dbh->prepare('select * from replies where topic_id = :id ORDER BY id DESC');
$fetch_replies->execute([
    ':id' => $_GET['id']
]);

if (isset($_POST['create_reply'])) {

    $author = $_SESSION['username'];
    $reply_content = htmlentities($_POST['reply_content']);

    $check_reply_content = $dbh->prepare('select * from replies where context = :context AND topic_id =:id');
    $check_reply_content->execute([
        ':context' => $reply_content,
        ':id' => $_GET['id']
    ]);

    if ($check_reply_content->rowCount() > 0) {
        $reply_content_taken = '<p class="text-danger">Topic title already exists</p>';
    } else {
        if (!$author) {
            echo '<div class="alert alert-success mt-3" role="alert">You must be logged in to do is</div>';
        } else {
            if (!$reply_content) {
                $content_error = '<p class="text-danger">Please enter some text before submitting!</p>';
            } else {
                $create_reply = $dbh->prepare('insert into replies (author, context, topic_id) values (:author, :context, :topic_id)');
                $create_reply->execute([
                    ':author' => $author,
                    ':topic_id' => $_GET['id'],
                    ':context' => $reply_content
                ]);

                $id = $_GET['id'];
                header("Location: topic.php?id=$id");
            }
        }
    }
}

if (isset($_POST['delete_post'])) {
    $deletepost = $dbh->prepare('delete from topics where id = :id; delete from replies where topic_id = :id');
    $deletepost->execute([
        ':id' => $_GET['id']
    ]);

    $id = $_GET['id'];
    header("Location: topic.php?id=$id");
}

if (isset($_POST['delete_reply'])) {
    $id = $_POST['delete_id'];
    $deletepost = $dbh->prepare('delete from replies where id = :id');
    $deletepost->execute([
        ':id' => $id
    ]);

    $id = $_GET['id'];
    header("Location: topic.php?id=$id");
}