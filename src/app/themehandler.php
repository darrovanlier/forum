<?php

$fetch_themes = $dbh->prepare('SELECT * FROM topics where theme_id = :id');
$fetch_themes->execute([
    ':id' => $_GET['id']
]);

//$fetch_title = $dbh->prepare('select * from themes where theme_id = :id');
//$fetch_title->execute([
//    ':id' => $_GET['id']
//]);


//$query_count_topics = $dbh->prepare('select count(*) from themes');
//$query_count_topics->execute();
//$count_topics = $query_count_topics->fetchColumn();
//
//function fetchThemeTitle($dbh) {
//    $statement = $dbh->prepare('SELECT title FROM themes WHERE theme_id = :id');
//    $statement->execute([
//        ':id' => $_GET['id']
//    ]);
//
//    $results = $statement->fetchall();
//    echo $results['title'];
//    echo $_GET['id'];
//}