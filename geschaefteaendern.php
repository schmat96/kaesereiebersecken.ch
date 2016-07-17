	<div id="hauptinformationprodukte">
		
		<?php
			include("datenbank/datenbankaufruf.php");
			$dbname = "home_text";
			
			if (isset($_GET["adminpw"])) {
				 $adminpw = $_GET["adminpw"];
				 } else {
				  $adminpw = "falsch";
				  }
			
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
							$check_1 = $_POST['check_1'];
							$check_2 = $_POST['check_2'];
							$check_3 = $_POST['check_3'];
							$check_4 = $_POST['check_4'];
							$check_5 = $_POST['check_5'];
							$check_6 = $_POST['check_6'];
							$check_7 = $_POST['check_7'];
							$check_8 = $_POST['check_8'];
							$check_9 = $_POST['check_9'];
							$check_10 = $_POST['check_10'];
							$check_11 = $_POST['check_11'];
							$check_12 = $_POST['check_12'];
							$check_13 = $_POST['check_13'];
							$check_14 = $_POST['check_14'];
							$check_15 = $_POST['check_15'];
							$check_16 = $_POST['check_16'];
							$check_17 = $_POST['check_17'];
							$check_18 = $_POST['check_18'];
							$check_19 = $_POST['check_19'];
							$check_20 = $_POST['check_20'];
							
							echo $check_1;
							echo $check_2;
							echo $check_3;
							
							
							
						  $sql = 'UPDATE `stefan`.`geschaefter` SET `name` = \''.$name.'\', `ortschaft` = \''.$ortschaft.'\', `webseite` = \''.$webseite.'\', `art` = \''.$art.'\', `verkauf_1` = \''.$check_1.'\', `verkauf_2` = \''.$check_2.'\', `verkauf_3` = \''.$check_3.'\', `verkauf_4` = \''.$check_4.'\', `verkauf_5` = \''.$check_5.'\', `verkauf_6` = \''.$check_6.'\', `verkauf_7` = \''.$check_7.'\', `verkauf_8` = \''.$check_8.'\', `verkauf_9` = \''.$check_9.'\', `verkauf_10` = \''.$check_10.'\', `verkauf_11` = \''.$check_11.'\', `verkauf_12` = \''.$check_12.'\', `verkauf_13` = \''.$check_13.'\', `verkauf_14` = \''.$check_14.'\', `verkauf_15` = \''.$check_15.'\', `verkauf_16` = \''.$check_16.'\', `verkauf_17` = \''.$check_17.'\', `verkauf_18` = \''.$check_18.'\', `verkauf_19` = \''.$check_19.'\', `verkauf_20` = \''.$check_20.'\' WHERE `geschaefter`.`id_geschaefter` = '.$id.';';
						  }
						  
						   if($option == "delete")
						  {
						  $sql = 'DELETE FROM `stefan`.`geschaefter` WHERE `geschaefter`.`id_geschaefter` = '.$id.'';
						  }
						  
						   if($option == "add") 
						   {
						   $sql = 'INSERT INTO `stefan`.`geschaefter` (`id_geschaefter`, `name`, `ortschaft`, `webseite`, `art`) VALUES (NULL, \''.$name.'\', \''.$ortschaft.'\', \''.$webseite.'\', \''.$art.'\');';
						   }
						  
							if ($_POST["adminpw"] == "a62b1fca6b53d6670a84aa2c7b373b27") {		
								$result = mysql_query($sql);
								if (!$result) {
									die('Ungueltige Anfrage: ' . mysql_error());
								}
								header("Location: geschaefteaendern.php?admin=a62b1fca6b53d6670a84aa2c7b373b27");
							} else {
							header("Location: passwort.php");
							}
						} else {
						
									
									$dbname2 = "geschaefter";	
							

							$abfrage2 = mysql_query('SELECT * FROM '.$dbname2.' ORDER BY `geschaefter`.`art`');
								$changevariable = 0;							
								while($ergebnis2 = mysql_fetch_array($abfrage2))		
									{
										$j = 1;
										
										
										$name = $ergebnis2["name"];
										$webseite = $ergebnis2["webseite"];
										$art = $ergebnis2["art"];
										$ortschaft = $ergebnis2["ortschaft"];
										$id = $ergebnis2["id_geschaefter"];
										$produkt = $ergebnis2["verkauf_".$j];
										
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
										echo "<input type=\"hidden\" name=\"adminpw\" value=\"$adminpw\">";
										
										$abfrageprodukte = mysql_query('SELECT * FROM produkte');
										$anzahl = mysql_num_rows($abfrageprodukte);
										
										while($j < "21")
											{
											
											 echo "<input type=\"hidden\" name=\"check_".$j."\">";
											 $j = $j + 1;
											}
										
										$j = 1;
										
										while($ergebnis = mysql_fetch_array($abfrageprodukte))
											{
											  //$id = $ergebnis["id_produkte"];
											  $name = $ergebnis["name"];
											  $check = $ergebnis2["verkauf_".$j];
											  //echo $check;
											 // if ($check == '0') {
											   echo $name.'<input type="checkbox" name="check_'.$j.'"';
											   if ($check == "on") {
											    echo "checked=\"checked\"";
											   } 
											   echo '>';
											  //} else {
											//  echo $name."<input type=\"button\" name=\"check_".$i."\" value=\"1\" checked=\"checked\" >";
											 //}
											 $j = $j + 1;
											}
										//echo "Gastronomie<input type=\"Checkbox\" name=\"art\" value=\"2\">";		
										echo "<input type=\"submit\" name=\"senden\" value=\"ändern\"/></form>";
										echo "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\">";	
										echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";	
										echo "<input type=\"hidden\" name=\"option\" value=\"delete\">";
										echo "<input type=\"hidden\" name=\"adminpw\" value=\"$adminpw\">";
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
										echo "<input type=\"hidden\" name=\"adminpw\" value=\"$adminpw\">";
										echo "<input type=\"submit\" name=\"senden\" value=\"hinzufügen\"/></form></br>";

									
						}
						
						
								
					
				

			
	?>