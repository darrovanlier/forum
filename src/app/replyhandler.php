<?php
$fetch_replies = $dbh->prepare('select * from replies where topic_id = :id ');
$fetch_replies->execute([
    ':id' => $_GET['id']
]);
