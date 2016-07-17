	<?php
			include("datenbank/datenbankaufruf.php");		
				 if (isset($_GET["id"])) {
					if (isset($_GET["db"])) {
						$dbname = $_GET["db"];
						$id = $_GET["id"];
						
						$sql = "DELETE FROM `stefan`.`".$dbname."` WHERE `".$dbname."`.`overview` = ".$id;	
						
						
						if ($_GET["adminpw"] == "a62b1fca6b53d6670a84aa2c7b373b27") {	
							$result = mysql_query($sql);
							if (!$result) {
								die('Ungültige Anfrage: ' . mysql_error());
							} else {
							header("Location: admin.php?admin=$adminpw");
							}
							} else {
							header("Location: passwort.php");
							}
						
						
				} else {
					echo("keine Datenbank angegeben!");
					} 
				} else {
					echo("keine Id angegeben!");
					}
	
	?>