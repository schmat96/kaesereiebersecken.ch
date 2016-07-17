<?php
$dbname="gaestebuch"; 
$dbhost="localhost";
$dbuser="root";
$dbpass=""; 
$dbconnection = mysql_connect($dbhost, $dbuser, $dbpass); 


mysql_select_db($dbname,$dbconnection);  

$name = $_POST['name'];
$eintrag = $_POST['eintrag'];
$date = date("Y.m.d");


$abfrage= "INSERT INTO `homepageanwendung`.`gaestebuch` (`id`, `name`, `datum`, `eintrag`, `ip`) VALUES (NULL, '".$name."', '".$date."', '".$eintrag."', '')";

if (mysql_query($abfrage, $dbconnection)){
  print("Daten erfolgreich eingetragen!");
}else{
  die("Fehler!");
}
?> 

