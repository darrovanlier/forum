<?php

try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=phpforum', 'root', '');
} catch (PDOException $e) {
    echo "Error with connection!" . $e->getMessage();
    die();
}