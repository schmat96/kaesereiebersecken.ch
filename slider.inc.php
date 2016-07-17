	<div id="hauptinformationprodukte">
		
		<?php
			include("datenbank/datenbankaufruf.php");
			$dbname = "slider";
			$adminpw = "a62b1fca6b53d6670a84aa2c7b373b27";			
		?>
	
	<?php
					
				$abfrage = mysql_query('SELECT * FROM slider');	
				while($ergebnis = mysql_fetch_array($abfrage))
				{
				  $source = $ergebnis["source"];
				  $woher = $ergebnis["woher"];
				  $id = $ergebnis["slider_id"];
				  echo "<img src=bilder/".$source." alt=".$woher." width=\"300\"></br><a href=loeschen.php?db=".$dbname."&id=".$id."&adminpw=".$adminpw.">löschen</a></br>";	  
				}
	?>
					<form name="uploadformular" enctype="multipart/form-data" action="dateiupload.php?art=slider&adminpw=4ba766482eac20519e7086b1b26d1a64" method="post" >
					Neues Bild: <input type="file" name="uploaddatei" size="60" maxlength="255" >
					<input type="Submit" name="submit" value="Datei hochladen">
					</form>
	</div>