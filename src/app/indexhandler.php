<?php
$fetch_themes = $dbh->prepare('SELECT * FROM themes order by id asc');
$fetch_themes->execute();
