<?php
$fetch_themes = $dbh->prepare('SELECT * FROM themes order by id asc');
$fetch_themes->execute();

//$fetch_last_thread = $dbh->prepare('SELECT * FROM topics ORDER BY ID DESC LIMIT 1');
//$fetch_last_thread->execute();


$query_count_themes = $dbh->prepare('select count(*) from themes');
$query_count_themes->execute();
$count_themes = $query_count_themes->fetchColumn();