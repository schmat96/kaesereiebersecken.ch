


<?php

$server = 'localhost';
$dbname = 'stefan';
$name = 'root';
$pass = '';

$db = mysql_connect($server, $name, $pass) or die('Server nicht gefunden');
mysql_select_db($dbname, $db) or die('DB konnte nicht erreicht werden');
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");
?>