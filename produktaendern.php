	<div id="hauptinformationprodukte">
		
		<?php
			include("datenbank/datenbankaufruf.php");
			$dbname = "home_text";
			
					if(isset($_POST['senden']))
						{
						  $name = $_POST['name'];
						  $id = $_POST['id'];
						  $ortschaft = $_POST['ortschaft'];
						  $webseite = $_POST['webseite'];
						  $art = $_POST['art'];
						  $option = $_POST['option'];
						  
						  
						  if($option == "change")
						  {
						  $sql = 'UPDATE `stefan`.`geschaefter` SET `name` = \''.$name.'\', `ortschaft` = \''.$ortschaft.'\', `webseite` = \''.$webseite.'\', `art` = \''.$art.'\' WHERE `geschaefter`.`id_geschaefter` = '.$id.';';
						  }
						  
						   if($option == "delete")
						  {
						  $sql = 'DELETE FROM `stefan`.`geschaefter` WHERE `geschaefter`.`id_geschaefter` = '.$id.'';
						  }
						  
						   if($option == "add") 
						   {
						   $sql = 'INSERT INTO `stefan`.`geschaefter` (`id_geschaefter`, `name`, `ortschaft`, `webseite`, `art`, `produktverkauf_1`, `produktverkauf_2`) VALUES (NULL, \''.$name.'\', \''.$ortschaft.'\', \''.$webseite.'\', \''.$art.'\', \'1\', \'1\');';
						   }
						  

							$result = mysql_query($sql);
							if (!$result) {
								die('Ungueltige Anfrage: ' . mysql_error());
							}
							header("Location: admin.php");
						} else {
						
									
									$dbname2 = "geschaefter";	
							

							$abfrage2 = mysql_query('SELECT * FROM '.$dbname2.' ORDER BY `geschaefter`.`art`');
								$changevariable = 0;							
								while($ergebnis2 = mysql_fetch_array($abfrage2))		
									{
										
										$name = $ergebnis2["name"];
										$webseite = $ergebnis2["webseite"];
										$art = $ergebnis2["art"];
										$ortschaft = $ergebnis2["ortschaft"];
										$id = $ergebnis2["id_geschaefter"];
										
										if($changevariable != $art)
										{
											$artname = mysql_result(mysql_query("SELECT * FROM art_geschaefte"), $art-1, 'art_geschaefte_name');
											echo "<h4>$artname</br></h4>";
											$changevariable = $art;
										}	
										echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\">";											
										echo "<input name=\"name\" type=\"text\" value=\"$name\"/>";
										echo "<input name=\"ortschaft\" type=\"text\" value=\"$ortschaft\"/>";
										echo "<input name=\"webseite\" type=\"text\" value=\"$webseite\"/>";
										echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
										echo "<input type=\"hidden\" name=\"art\" value=\"$art\">";
										echo "<input type=\"hidden\" name=\"option\" value=\"change\">";
										echo "<input type=\"submit\" name=\"senden\" value=\"ändern\"/></form>";
										echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\">";	
										echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";	
										echo "<input type=\"hidden\" name=\"option\" value=\"delete\">";
										echo "<input type=\"submit\" name=\"senden\" value=\"delete\"/></form></br>";										
										
									
										
									}
										echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\">";
										echo "<h4>Hinzufügen</br></h4><input name=\"name\" type=\"text\"/>";
										echo "<input name=\"ortschaft\" type=\"text\" />";
										echo "<input name=\"webseite\" type=\"text\" />";
										echo "<input type=\"hidden\" name=\"id\" >";
										echo " Detailhandel<input type=\"radio\" name=\"art\" value=\"1\">";
										echo "Gastronomie<input type=\"radio\" name=\"art\" value=\"2\">";		
										echo "<input type=\"hidden\" name=\"option\" value=\"add\">";										
										echo "<input type=\"submit\" name=\"senden\" value=\"hinzufügen\"/></form></br>";

									
						}
						
						
								
					
				

			
	?>