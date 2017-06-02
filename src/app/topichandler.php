<?php
$fetch_topics = $dbh->prepare('select * from topics where theme_id = :id ');
$fetch_topics->execute([
    ':id' => $_GET['id']
]);

$query_count_replies= $dbh->prepare('select count(*) from themes');
$query_count_replies->execute();
$count_replies = $query_count_replies->fetchColumn();