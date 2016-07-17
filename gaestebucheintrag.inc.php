<?php
$dbname="gaestebuch"; 
$dbhost="localhost";
$dbuser="root";
$dbpass=""; 
$dbconnection = mysql_connect($dbhost, $dbuser, $dbpass); 


mysql_select_db($dbname,$dbconnection);  

$name = $_POST['name'];
$eintrag = $_POST['eintrag'];


$abfrage="INSERT INTO gaestebuch (name, eintrag) 
    VALUES ('".$name."', '".$eintrag."')";
if (mysql_query($abfrage, $dbconnection)){
  print("Daten erfolgreich eingetragen!");
}else{
  die("Fehler!");
}
?>  