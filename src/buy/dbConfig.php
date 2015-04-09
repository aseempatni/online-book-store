<?php
define('DB_HOST', '10.5.18.66');
define('DB_NAME', '12CS10023');
define('DB_USER','12CS10023');
define('DB_PASSWORD','btech12');

$link = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD)  or die("Couldn't make connection.");
$db = mysql_select_db(DB_NAME, $link) or die("Couldn't select database");
?>
