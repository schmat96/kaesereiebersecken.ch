	<div id="hauptinformationprodukte">
		
		<?php
			include("datenbank/datenbankaufruf.php");
			$dbname = "home_text";
			
			if (isset($_GET["adminpw"])) {
				 $adminpw = $_GET["adminpw"];
				 } else {
				  $adminpw = "falsch";
				  }
			
			 if (isset($_GET["index"])) {
					if (isset($_GET["db"])) {
						$dbname = $_GET["db"];
						$id = $_GET["index"];
				}
			}
			
			
			
					
					
					if(isset($_POST['senden']))
						{
						  $header = $_POST['header'];
						  $text = $_POST['text'];
						  $dbname = $_POST['dbname'];
						  $id = $_POST['id'];
						  echo $text;
							
					
						  $sql = 'UPDATE `stefan`.`' . $dbname .'` SET `header` = \''.$header.'\', `text` = \''.$text.'\' WHERE `'.$dbname.'`.`overview` = '.$id.';';
						  
						  
						if ($_POST["adminpw"] == "a62b1fca6b53d6670a84aa2c7b373b27") {	
							$result = mysql_query($sql);
							if (!$result) {
								die('Ungueltige Anfrage: ' . mysql_error());
							}
							header("Location: admin.php");
							} else {
							header("Location: passwort.php");
							}
						} else {
						
									if (isset($_GET["id"])) {
									if (isset($_GET["db"])) {
									$dbname = $_GET["db"];
									$id = $_GET["id"];
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
						}
						
						
								
					
				echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\">Header</br><input name=\"header\" type=\"text\" value=\"$header\"/></br>Text</br><textarea name=\"text\" rows=\"10\">$text</textarea></br><input type=\"submit\" name=\"senden\" value=\"ändern\"/><input type=\"hidden\" name=\"id\" value=\"$id\"><input type=\"hidden\" name=\"dbname\" value=\"$dbname\"><input type=\"hidden\" name=\"adminpw\" value=\"$adminpw\"></form>";	

			
	?>