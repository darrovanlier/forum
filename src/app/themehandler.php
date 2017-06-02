<?php
$fetch_topics = $dbh->prepare('select * from topics where theme_id = :id ');
$fetch_topics->execute([
    ':id' => $_GET['id']
]);
