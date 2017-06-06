<?php

$content_error = null;
$create_reply_msg = null;
$remove = null;
$deletepost_msg = null;
$deletereply_msg = null;

$fetch_thread = $dbh->prepare('select * from topics where id = :id');
$fetch_thread->execute([
    ':id' => $_GET['id']
]);

$fetch_replies = $dbh->prepare('select * from replies where topic_id = :id');
$fetch_replies->execute([
    ':id' => $_GET['id']
]);

if (isset($_POST['create_reply'])) {

    $author = $_SESSION['username'];
    $reply_content = htmlentities($_POST['reply_content']);

    if (!$reply_content) {
        $content_error = '<p class="text-danger">Please enter some text before submitting!</p>';
    } else {
        $create_reply = $dbh->prepare('insert into replies (author, context, topic_id) values (:author, :context, :topic_id)');
        $create_reply->execute([
            ':author' => $author,
            ':topic_id' => $_GET['id'],
            ':context' => $reply_content
        ]);

        $create_reply_msg = '<div class="alert alert-success" role="alert"><a href="#"> Your reply has been posted</a></div>';
    }

}

if (isset($_POST['delete_post'])) {
    $deletepost = $dbh->prepare('delete from topics where id = :id; delete from replies where id = :id');
    $deletepost->execute([
        ':id' => $_GET['id']
    ]);

    $deletepost_msg = '<div class="alert alert-success mt-3" role="alert">Your thread has been deleted!</div>';

}