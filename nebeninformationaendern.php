	<div id="hauptinformationprodukte">
		
		<?php
			include("datenbank/datenbankaufruf.php");
			$dbname = "nebeninformation";
			
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
						  
								$text = $_POST["text"];
								$titel = $_POST["titel"];
								$link_text = $_POST["link_text"];
								$link = $_POST["link"];
								$id = $_POST["id"];
								
								$sql = 'UPDATE `stefan`.`nebeninformation` SET `ort` = \'1\', `titel` = \''.$titel.'\', `text` = \''.$text.'\', `link` = \''.$link.'\', `link_text` = \''.$link_text.'\' WHERE `nebeninformation`.`nebeninformation_id` = 1;';
						  }
						  
						   if($option == "delete")
						  {
							$id = $_POST['id'];
							$sql = 'DELETE FROM `stefan`.`nebeninformation` WHERE `nebeninformation`.`nebeninformation_id` = '.$id.'';
						  }
						  
						   if($option == "add") 
						   {
								$text = $_POST["text"];
								$titel = $_POST["titel"];
								$link_text = $_POST["link_text"];
								$link = $_POST["link"];
							$sql = "INSERT INTO `stefan`.`nebeninformation` (`nebeninformation_id`, `ort`, `titel`, `text`, `bild`, `link`, `link_text`) VALUES (NULL, \'1\', \''.$titel.'\', \''.$text.'\', \'\', \''.$link.'\', \''.$link_text.'\');";
						   }
							
							if ($_POST["adminpw"] == "a62b1fca6b53d6670a84aa2c7b373b27") {
								
								$result = mysql_query($sql);
								header("Location: admin.php?admin=".$adminpw."");
								if (!$result) {
									die('Ungueltige Anfrage: ' . mysql_error());
								}
								
							
							} else {
								echo $_POST["adminpw"];
								header("Location: passwort.php");
							}
						} else {
						
									
									$dbname2 = "produkte";	
							

							$abfrage4 = mysql_query('SELECT * FROM nebeninformation');
		
									while($ergebnis4 = mysql_fetch_array($abfrage4))
										{
										  $text = $ergebnis4["text"];
										  $bild = $ergebnis4["bild"];
										  $titel = $ergebnis4["titel"];
										  $link_text = $ergebnis4["link_text"];
										  $link = $ergebnis4["link"];
										  $id = $ergebnis4["nebeninformation_id"];

										echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\">";											
										echo "<textarea name=\"titel\" rows=\"10\">$titel</textarea>";
										echo "<textarea name=\"text\" rows=\"10\">$text</textarea>";
										echo "<textarea name=\"link\" rows=\"10\">$link</textarea>";
										echo "<textarea name=\"link_text\" rows=\"10\">$link_text</textarea>";
										echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
										echo "<input type=\"hidden\" name=\"option\" value=\"change\">";
										echo "<input type=\"hidden\" name=\"adminpw\" value=\"$adminpw\">";
										echo "<input type=\"submit\" name=\"senden\" value=\"ändern\"/></form>";
			
										echo "<form name=\"uploadformular\" enctype=\"multipart/form-data\" action=\"dateiupload.php?art=nebeninformation&idprodukte=$id&adminpw=$adminpw\" method=\"post\" > Neues Bild: <input type=\"file\" name=\"uploaddatei\" size=\"60\" maxlength=\"255\" ><input type=\"Submit\" name=\"submit\" value=\"Datei hochladen\"></form>";
										
										
										echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\">";	
										echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";	
										echo "<input type=\"hidden\" name=\"option\" value=\"delete\">";
										echo "<input type=\"hidden\" name=\"adminpw\" value=\"$adminpw\">";
										echo "<input type=\"submit\" name=\"senden\" value=\"delete\"/></form></br>";
										
										}

										echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\">";
										echo "<h4>Hinzufügen</br></h4><textarea name=\"titel\" rows=\"10\">Titel</textarea>";
										echo "<textarea name=\"text\" rows=\"10\">Text</textarea>";
										echo "<textarea name=\"link\" rows=\"10\">link (www.google.ch/...)</textarea>";
										echo "<textarea name=\"link_text\" rows=\"10\">Text zum Link</textarea>";
										echo "<input type=\"hidden\" name=\"option\" value=\"add\">";
										echo "<input type=\"hidden\" name=\"adminpw\" value=\"$adminpw\">";										
										echo "<input type=\"submit\" name=\"senden\" value=\"hinzufügen\"/></form></br>";										
																				
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
										
										
										echo "<input type=\"submit\" name=\"senden\" value=\"ändern\"/></form>";
										
										echo "<form name=\"uploadformular\" enctype=\"multipart/form-data\" action=\"dateiupload.php?art=produkt&idprodukte=$id\" method=\"post\" > Neues Bild: <input type=\"file\" name=\"uploaddatei\" size=\"60\" maxlength=\"255\" ><input type=\"Submit\" name=\"submit\" value=\"Datei hochladen\"></form>";

										
										
										echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\">";	
										echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";	
										echo "<input type=\"hidden\" name=\"option\" value=\"delete\">";
										echo "<input type=\"submit\" name=\"senden\" value=\"delete\"/></form></br>";										
										
									
										
									}
										echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\">";
										echo "<h4>Hinzufügen</br></h4><input name=\"name\" type=\"text\">";
										echo "<input name=\"beschreibung\" type=\"text\" >";
										//echo "Neues Bild: <input type=\"file\" name=\"uploaddatei\" size=\"60\" maxlength=\"255\" >";
										echo "<input type=\"hidden\" name=\"id\" >";
										echo "<input type=\"hidden\" name=\"option\" value=\"add\">";										
										echo "<input type=\"submit\" name=\"senden\" value=\"hinzufügen\"/></form></br>";
										
										*/
										

									
						}
						
						
				
						
								
					
				

			
	?>