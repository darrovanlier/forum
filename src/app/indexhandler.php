<?php
$fetch_themes = $dbh->prepare('select * from themes order by id asc');
$fetch_themes->execute();