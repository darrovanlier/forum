<?php
@include_once ('../dbconn.php');
function query($qry, $par) {
    global $dbh;
    $statement = $dbh->prepare($qry);
    $statement->execute($par);
}
function fetchAll() {
    global $statement;
	if($statement) {
        return $statement->fetchAll();
    } else {
        return null;
    }
}
function fetch() {
    global $statement;
    if($statement) {
        return $statement->fetch();
    } else {
        return null;
    }
}