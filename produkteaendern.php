	<div id="hauptinformationprodukte">
		
		<?php
			include("datenbank/datenbankaufruf.php");
			$dbname = "produkte";
			
			if (isset($_GET["adminpw"])) {
				 $adminpw = $_GET["adminpw"];
				 } else {
				  $adminpw = "falsch";
				  }
			
					if(isset($_POST['senden']))
						{
							 $option = $_POST['option'];
						
						  

						  if($option == "change")
						  {
						  
							  $name = $_POST['name'];
							  $beschreibung = $_POST['beschreibung'];
							  $option = $_POST['option'];
							  $id = $_POST['id'];
							  $anzahl = $_POST['anzahl'];
						  
						  //$sql = 'UPDATE `stefan`.`geschaefter` SET `name` = \''.$name.'\', `ortschaft` = \''.$ortschaft.'\', `webseite` = \''.$webseite.'\', `art` = \''.$art.'\' WHERE `geschaefter`.`id_geschaefter` = '.$id.';';

						$sql = 'UPDATE `stefan`.`produkte` SET `name` = \''.$name.'\', `beschreibung` = \''.$beschreibung.'\' WHERE `produkte`.`id_produkte` = '.$id.';';
							
							
						/*
							for ($i = 0; $i < $anzahl; $i++)
								$zahl = $_POST[$idgeschaeft];							
								$sql2 = 'UPDATE `stefan`.`geschaefter` SET `'.$id.'` = \''.$zahl.'\' WHERE `geschaefter`.`id_geschaefter` = '.$i.';';
											$result = mysql_query($sql2);
										if (!$result) {
											die('Ungueltige Anfrage: ' . mysql_error());
										}		
						*/
						  }
						  
						   if($option == "delete")
						  {

							$id = $_POST['id'];
						
						  
						  
						  $sql = 'DELETE FROM `stefan`.`produkte` WHERE `produkte`.`id_produkte` = '.$id.'';
						  }
						  
						   if($option == "add") 
						   {
							$name = $_POST['name'];
							$beschreibung = $_POST['beschreibung'];
							$sql = 'INSERT INTO `stefan`.`produkte` (`id_produkte`, `name`, `beschreibung`, `img_source`, `verkauf`) VALUES (NULL, \''.$name.'\', \''.$beschreibung.'\', \'\', \'\');';
						   }
						  
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
						
									
									$dbname2 = "produkte";	
							

							$abfrage2 = mysql_query('SELECT * FROM '.$dbname2.' ORDER BY `produkte`.`id_produkte`');
								$changevariable = 0;							
								while($ergebnis2 = mysql_fetch_array($abfrage2))		
									{
										$name = $ergebnis2["name"];
										$beschreibung = $ergebnis2["beschreibung"];
										$img_source = $ergebnis2["img_source"];
										$verkauf = $ergebnis2["verkauf"];
										$id = $ergebnis2["id_produkte"];

										echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\">";											
										echo "<input name=\"name\" type=\"text\" value=\"$name\"/>";
										echo "<input name=\"beschreibung\" type=\"text\" value=\"$beschreibung\"/>";
										echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
										echo "<input type=\"hidden\" name=\"verkauf\" value=\"$verkauf\">";
										echo "<input type=\"hidden\" name=\"option\" value=\"change\">";
										echo "<input type=\"hidden\" name=\"adminpw\" value=\"$adminpw\">";
										$abfrage3 = mysql_query('SELECT * FROM geschaefter');
										$anzahl = mysql_num_rows($abfrage3);
										
										/*
										while($ergebnis = mysql_fetch_array($abfrage3))
											{
											  $ja = $ergebnis[$id];
											  $geschaeftname = $ergebnis["name"];
											  $idgeschaeft = $ergebnis["id_geschaefter"];
											    if ($ja == "1") {
													echo "</br>".$geschaeftname."<input type=\"checkbox\" name=\"".$idgeschaeft."\" checked=\"checked\" value=\"1\">";
													} else {
													echo "</br>".$geschaeftname."<input type=\"checkbox\" name=\"".$idgeschaeft."\" value=\"0\">";
													}
											}
										
										
										echo "<input type=\"hidden\" name=\"anzahl\" value=\"".$idgeschaeft."\">";
										*/
										
										echo "<input type=\"submit\" name=\"senden\" value=\"ändern\"/></form>";
										
										echo "<form name=\"uploadformular\" enctype=\"multipart/form-data\" action=\"dateiupload.php?art=produkt&idprodukte=$id&adminpw=$adminpw\" method=\"post\" > Neues Bild: <input type=\"file\" name=\"uploaddatei\" size=\"60\" maxlength=\"255\" ><input type=\"hidden\" name=\"option\" value=\"$adminpw\"><input type=\"Submit\" name=\"submit\" value=\"Datei hochladen\"></form>";

										
										
										echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\">";	
										echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";	
										echo "<input type=\"hidden\" name=\"option\" value=\"delete\">";
										echo "<input type=\"hidden\" name=\"adminpw\" value=\"$adminpw\">";
										echo "<input type=\"submit\" name=\"senden\" value=\"delete\"/></form></br>";
										
										
									
										
									}
										echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\">";
										echo "<h4>Hinzufügen</br></h4><input name=\"name\" type=\"text\">";
										echo "<input name=\"beschreibung\" type=\"text\" >";
										//echo "Neues Bild: <input type=\"file\" name=\"uploaddatei\" size=\"60\" maxlength=\"255\" >";
										echo "<input type=\"hidden\" name=\"id\" >";
										echo "<input type=\"hidden\" name=\"option\" value=\"add\">";		
										echo "<input type=\"hidden\" name=\"adminpw\" value=\"$adminpw\">";										
										echo "<input type=\"submit\" name=\"senden\" value=\"hinzufügen\"/></form></br>";

									
						}
						
						
				
						
								
					
				

			
	?>