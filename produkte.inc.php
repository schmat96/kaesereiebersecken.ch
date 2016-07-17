		<div id="hauptinformationprodukte">
		
		<?php
			include("datenbank/datenbankaufruf.php");
			$dbname = "produkte";
			$dbname2 = "geschaefter";	
			$adminpw = "a62b1fca6b53d6670a84aa2c7b373b27";			
		?>
	
		<div id="produkte">
		<ul>
			
			
				<?php
			$abfrage = mysql_query('SELECT * FROM '.$dbname.'');
			
			$anzahl = mysql_num_rows($abfrage);
			$j = 1;
			
			while($ergebnis = mysql_fetch_array($abfrage))
				{
				  $name = $ergebnis["name"];
				  $beschreibung = $ergebnis["beschreibung"];
				  $img_source = $ergebnis["img_source"];
				  $id_produkte = $ergebnis["id_produkte"];
				  
				  echo "<li><h1>$name";
				  if (isset($_GET["admin"])) {
					$admin = $_GET["admin"];
					if ($admin == $adminpw) {
						echo(' <a href=produkteaendern.php?id='.$id_produkte.'&db='.$dbname.'&adminpw='.$adminpw.'> - ändern</a>');
					} else {
						echo('<a href=passwort.php>PW ist nicht korrekt!</a>');
					}
				}

				  echo "</h1><img src=\"$img_source\" /><h2>$beschreibung</p></br><div id=\"abstand\"></div><a href=\"#$name\" class=\"openModal\">Verkauf</a></h2><aside id=\"$name\" class=\"modal\"><div><p> Folgende Geschäfte verkaufen dieses Produkt: </p><p>";
				  

					$abfrage2 = mysql_query('SELECT * FROM '.$dbname2.' WHERE verkauf_'.$j.' = \'on\'');
					$j = $j + 1;
					$changevariable = 0;
						while($ergebnis2 = mysql_fetch_array($abfrage2))		
				{
					
					$name = $ergebnis2["name"];
					$art = $ergebnis2["art"];
					
					if($changevariable != $art)
					{
						$artname = mysql_result(mysql_query("SELECT * FROM art_geschaefte"), $art-1, 'art_geschaefte_name');
						echo "<h3>$artname</br></h3> ";
						$changevariable = $art;
					}
					echo "$name </br>";
				}
				  echo "</p><a href=\"#close\" title=\"schließen\">schließen</a></div></aside></li> ";
				}
			?>	
			
		</ul>
	</div>
	
	</div>
	