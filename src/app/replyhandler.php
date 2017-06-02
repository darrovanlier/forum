<?php
$fetch_replies = $dbh->prepare('SELECT replies.id, replies.context, replies.created_at, replies.user_id, replies.topic_id, users.username FROM users INNER JOIN replies ON users.id = replies.user_id where topic_id = :id ');
$fetch_replies->execute([
    ':id' => $_GET['id']
]);
