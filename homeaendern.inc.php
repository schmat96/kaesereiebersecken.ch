	<div id="hauptinformationprodukte">
		
		<?php
			include("datenbank/datenbankaufruf.php");
			
			 if (isset($_GET["index"])) {
					if (isset($_GET["db"])) {
						$dbname = $_GET["db"];
						$id = $_GET["index"];
				}
			}
			
			
				$abfrage = mysql_query('SELECT * FROM '.$dbname.' WHERE overview=\''.$id.'\'');
				while($ergebnis = mysql_fetch_array($abfrage))
					{
					  $text = $ergebnis["text"];
					  $overview = $ergebnis["overview"];
					  $header = $ergebnis["header"];
					  $spezial = $ergebnis["spezial"];
					}
					
					
					if(isset($_POST['senden']))
						{
						  $header = $_POST['header'];
						  $text = $_POST['text'];
						  echo("<h2>POST-Anfrage</h2>");
						  echo("Der Benutzer $name möchte mit Passwort $pw einloggen.");
						}
					
					
					
				echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\">Header</br><input name=\"header\" type=\"text\" value=\"$header\"/></br>Text</br><textarea name=\"text\"rows=\"10\">$text</textarea></br><input type=\"submit\" name=\"senden\" value=\"ändern\"/></form>";				
	?>