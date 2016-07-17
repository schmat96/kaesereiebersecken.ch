	<?php
			include("datenbank/datenbankaufruf.php");		
				
				
				if(isset($_POST['senden']))
					{
						$header = $_POST['header'];
						$text = $_POST['text'];
						$spezial = $_POST['spezial'];
						
						$sql = 'INSERT INTO `stefan`.`home_text` (`overview`, `header`, `text`, `spezial`, `art`) VALUES (NULL, \''.$header.'\', \''.$text.'\', \''.$spezial.'\', \'2\');';
						
						
						if ($_POST["adminpw"] == "a62b1fca6b53d6670a84aa2c7b373b27") {	
							$result = mysql_query($sql);
							if (!$result) {
								die('Ungültige Anfrage: ' . mysql_error());
							} else {
							$adminpw = $_POST["adminpw"];
							header("Location: admin.php?admin=$adminpw");
							}
							} else {
							header("Location: passwort.php");
							}
				} 
					
			
	
	?>
			<h2>Hinzufügen</h2>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			  <label for="benutzer">Header:</label> <input type="text" name="header" />
			  <textarea name="text">Text</textarea> 
			  <textarea name="spezial"></textarea> 
			  <input type="hidden" name="adminpw" value="4ba766482eac20519e7086b1b26d1a64">
			  <input type="submit" name="senden" value="Hinzufügen" />
			</form>   
	

	