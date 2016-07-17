

	
	<div id="hauptinformationprodukte">
	
	<?php
			include("datenbank/datenbankaufruf.php");
			$dbname = "kontakt_text";
			$dbname2 = "geschaefter";	
			$adminpw = "a62b1fca6b53d6670a84aa2c7b373b27";			
	?>
	
	
	<?php
		$abfrage = mysql_query('SELECT * FROM '.$dbname.' WHERE art=\'2\'');
		$anzahl = mysql_num_rows($abfrage);
			for ($i = 0; $i < $anzahl; $i++)
			{
				$text = mysql_result($abfrage, $i, 'text');
				$header = mysql_result($abfrage, $i, 'header');
				$spezial = mysql_result($abfrage, $i, 'spezial');
				$overview = mysql_result($abfrage, $i, 'overview');
				echo "<h3>$header</h3><p>$text</p><br />$spezial";
				
				if (isset($_GET["admin"])) {
					$admin = $_GET["admin"];
					if ($admin == $adminpw) {
					if ($overview == '2') {
					echo(' <a href=geschaefteaendern.php?admin='.$adminpw.'&index='.$overview.'&db='.$dbname.'&adminpw='.$adminpw.'>editieren</a>');
				} else {
					echo(' <a href=homeaendern.php?admin='.$adminpw.'&index='.$overview.'&db='.$dbname.'&adminpw='.$adminpw.'>editieren</a>');
				}
			}	else {
				echo('<a href=passwort.php>PW ist nicht korrekt!</a>');
			}
		}
		}
		
		$abfrage2 = mysql_query('SELECT * FROM '.$dbname2.' ORDER BY `geschaefter`.`art`');
			$changevariable = 0;
			while($ergebnis2 = mysql_fetch_array($abfrage2))		
				{
					
					$name = $ergebnis2["name"];
					$art = $ergebnis2["art"];
					$ortschaft = $ergebnis2["ortschaft"];
					$webseite = $ergebnis2["webseite"];
					
					if($changevariable != $art)
					{
						$artname = mysql_result(mysql_query("SELECT * FROM art_geschaefte"), $art-1, 'art_geschaefte_name');
						echo "<h4>$artname</br></h4>";
						$changevariable = $art;
					}
					
					//echo "<div id=\"geschaeftverkauf\">";
					if ($webseite == "" OR $webseite == "nein") {
					echo "$name, $ortschaft";
					} else {
					echo "<a href=\"$webseite\">$name, $ortschaft</a>";
					}
					
					echo "</br>";
					
					
					/*
					 echo "<a href=\"#$name\" class=\"openModal\">Verkauf</a></div><aside id=\"$name\" class=\"modal\"><div><p>Folgende Produkte verkauft dieses Geschäft:";

					 for ($i = 1; $i < "21"; $i++)
						{
					 $verkauf = $ergebnis2["verkauf_".$i.""];
					 if ($verkauf == "on") {
							
							$produkte = "SELECT * FROM `produkte`";
							$j = $i;
							$produktname = mysql_result($produkte, $j, 'name');
							echo $produktname;
						}
					}
					 
					 
					 
					 
					 echo "</p><p>";
					 echo "</p><a href=\"#close\" title=\"schließen\">schließen</a></div></aside></li></br>";
					 */
				}
		?>	
	
	</div>
	
	<div id="nebeninformation">
	<ul>
		<li><p></p></li>
	
	<?php
		$abfrage4 = mysql_query('SELECT * FROM nebeninformation');
		
			while($ergebnis4 = mysql_fetch_array($abfrage4))
				{
				  $text = $ergebnis4["text"];
				  $bild = $ergebnis4["bild"];
				  $titel = $ergebnis4["titel"];
				  $link_text = $ergebnis4["link_text"];
				  $link = $ergebnis4["link"];
				  
				  echo '<li><p class=\"angebot\"><img src='.$bild.' class=foto alt='.$bild.' /><strong>'.$titel.'</strong></br>'.$text.'</br><a href='.$link.' title=Link zu Detailinformationen>'.$link_text.'</a></p>';
				  
				  if (isset($_GET["admin"])) {
					$admin = $_GET["admin"];
					if ($admin == $adminpw) {
					echo(' <a href=nebeninformationaendern.php?id='.$overview.'&db='.$dbname.'&adminpw='.$adminpw.'>editieren</a></li>');
					} else {
				echo('<a href=passwort.php> PW ist nicht korrekt!</a></li>');
					} 
				}
			}
	?>
	</ul>
		
	</div>



