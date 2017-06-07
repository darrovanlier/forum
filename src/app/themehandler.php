<?php
$create_reply = null;
$create_reply_msg = null;
$content_error = null;
$topic_title_taken = null;


$fetch_themes = $dbh->prepare('SELECT * FROM topics where theme_id = :id');
$fetch_themes->execute([
    ':id' => $_GET['id']
]);

$query_fetch_themes = $dbh->prepare('SELECT * FROM themes where id = :id');
$query_fetch_themes->execute([
    ':id' => $_GET['id']
]);

if (isset($_POST['create_topic'])) {
    $author = $_SESSION['username'];
    $topic_description = htmlentities($_POST['topic_description']);
    $topic_title = htmlentities($_POST['topic_title']);

    $check_topic_title = $dbh->prepare('select * from topics where title = :title');
    $check_topic_title->execute([
        ':title' => $topic_title
    ]);

    if ($check_topic_title->rowCount() > 0) {
        $topic_title_taken_msg = '<p class="text-danger">Topic title already exists</p>';
    }   else {
            if (!$author) {
                echo '<div class="alert alert-success mt-3" role="alert">You must be logged in to do is</div>';
            } else {
                if (!$topic_description) {
                    $content_error = '<p class="text-danger">Please enter some text before submitting!</p>';
                } else {
                    $create_reply = $dbh->prepare('insert into topics (author, context, theme_id, title) values (:author, :context, :theme_id, :title)');
                    $create_reply->execute([
                        ':author' => $author,
                        ':theme_id' => $_GET['id'],
                        ':title' => $topic_title,
                        ':context' => $topic_description
                    ]);
                    $create_reply_msg = '<div class="alert alert-success mt-3" role="alert"><a href="#"> Your reply has been posted</a></div>';
                }
            }
        }
}






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