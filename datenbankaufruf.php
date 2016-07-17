


<?php

define ( 'MYSQL_HOST', 'localhost' );
define ( 'MYSQL_BENUTZER', 'web449' );
define ( 'MYSQL_KENNWORT', 'fp5306d2' );
define ( 'MYSQL_DATENBANK', 'usr_web449_1' );

$db_link = mysqli_connect (MYSQL_HOST,
                           MYSQL_BENUTZER,
                           MYSQL_KENNWORT,
                           MYSQL_DATENBANK
                          );
if ( ! $db_link )
{
    // hier sollte dann später dem Programmierer eine
    // E-Mail mit dem Problem zukommen gelassen werden
    // die Fehlermeldung für den Programmierer sollte
    // das Problem ausgeben mit: mysql_error()
    die('keine Verbindung zur Zeit möglich - später probieren ');
	$fehler .= mysql_error();
	
	 	$to = "mathias_schmid96@hotmail.com";
		$subject = "Testmail";
 
		mail($to, $subject, $fehler); 
}
?>