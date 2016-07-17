<?php

include("daten.php"); 

$dbconnection = mysql_connect($dbhost, $dbuser, $dbpass); 
mysql_select_db($dbname,$dbconnection);  

$name = $_POST['name'];
$eintrag = $_POST['eintrag'];
$date = date("Y.m.d");


$abfrage= "INSERT INTO `usr_web449_1`.`gaestebuch` (`id`, `name`, `date`, `eintrag`) VALUES (NULL, '".$name."', '".$date."', '".$eintrag."')";

if (mysql_query($abfrage, $dbconnection)){
  print("Daten erfolgreich eingetragen!");
}else{
  die("Fehler!");
}
?> 

Zurueck zum <a href="index.php?inhalt=gaestebuch" title="">Gaestebuch</a>