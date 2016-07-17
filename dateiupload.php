<?php
			include("datenbank/datenbankaufruf.php");
			$adminpw = "a62b1fca6b53d6670a84aa2c7b373b27";			
			
			if (isset($_GET["adminpw"])) {
				 $adminpw = $_GET["adminpw"];
				 } else {
				  $adminpw = "falsch";
				}
			
if ( $_FILES['uploaddatei']['name']  <> "" )
{
    // Datei wurde durch HTML-Formular hochgeladen
    // und kann nun weiterverarbeitet werden
 
    // Kontrolle, ob Dateityp zulässig ist
    $zugelassenedateitypen = array("image/png", "image/jpeg", "image/gif");
 
    if ( ! in_array( $_FILES['uploaddatei']['type'] , $zugelassenedateitypen ))
    {
        echo "<p>Dateitype ist NICHT zugelassen</p>";
    }
    else
    {
        // Test ob Dateiname in Ordnung
        $_FILES['uploaddatei']['name'] = dateiname_bereinigen($_FILES['uploaddatei']['name']);
		$dateiname = $_FILES['uploaddatei']['name'];
		
		
		$art = $_GET["art"];
		
		if ($art == "produkt") {
			$id = $_GET["idprodukte"];
			$sql = 'UPDATE `stefan`.`produkte` SET `img_source` = \'images/'.$dateiname.'\' WHERE `produkte`.`id_produkte` = '.$id.';';
		}

		if ($art == "nebeninformation") {
			$id = $_GET["idprodukte"];
			$sql = 'UPDATE `stefan`.`nebeninformation` SET `bild` = \'nebeninformation/'.$dateiname.'\' WHERE `nebeninformation`.`nebeninformation_id` = '.$id.';';
		} 
		
		if ($art == "slider") {
		$abfrage = mysql_query("SELECT * FROM slider");
		$id = mysql_num_rows($abfrage)+1;
		echo $id;
		$sql = 'INSERT INTO `stefan`.`slider` (`slider_id`, `source`, `woher`) VALUES (NULL, \''. $dateiname .'\', \'Mathias Schmid\');';
		}

		
		if ($adminpw == "4ba766482eac20519e7086b1b26d1a64") {	
			$result = mysql_query($sql);
							if (!$result) {
								die('Ungueltige Anfrage: ' . mysql_error());
							}
		} else {
			header("Location: passwort.php");
		}
 
        if ( $_FILES['uploaddatei']['name'] <> '' )
        {
			if ($art == "slider") {
            move_uploaded_file (
                 $_FILES['uploaddatei']['tmp_name'] ,
                 'bilder/'. $_FILES['uploaddatei']['name'] );
			} 
			if ($art == "produkt") {
			move_uploaded_file (
						 $_FILES['uploaddatei']['tmp_name'] ,
						 'images/'. $_FILES['uploaddatei']['name'] );
			}
			if ($art == "nebeninformation") {
			move_uploaded_file (
                 $_FILES['uploaddatei']['tmp_name'] ,
                 'nebeninformation/'. $_FILES['uploaddatei']['name'] );
			}
			header("Location: admin.php?admin=$adminpw");
        }
        else
        {
            echo "<p>Dateiname ist nicht zul&auml;ssig</p>";
        }
    }
}

function dateiname_bereinigen($dateiname)
{
    // erwünschte Zeichen erhalten bzw. umschreiben
    // aus allen ä wird ae, ü -> ue, ß -> ss (je nach Sprache mehr Aufwand)
    // und sonst noch ein paar Dinge (ist schätzungsweise mein persönlicher Geschmach ;)
    $dateiname = strtolower ( $dateiname );
    $dateiname = str_replace ('"', "-", $dateiname );
    $dateiname = str_replace ("'", "-", $dateiname );
    $dateiname = str_replace ("*", "-", $dateiname );
    $dateiname = str_replace ("ß", "ss", $dateiname );
    $dateiname = str_replace ("&szlig;", "ss", $dateiname );
    $dateiname = str_replace ("ä", "ae", $dateiname );
    $dateiname = str_replace ("&auml;", "ae", $dateiname );
    $dateiname = str_replace ("ö", "oe", $dateiname );
    $dateiname = str_replace ("&ouml;", "oe", $dateiname );
    $dateiname = str_replace ("ü", "ue", $dateiname );
    $dateiname = str_replace ("&uuml;", "ue", $dateiname );
    $dateiname = str_replace ("&Auml;", "ae", $dateiname );
    $dateiname = str_replace ("&Ouml;", "oe", $dateiname );
    $dateiname = str_replace ("&Uuml;", "ue", $dateiname );
    $dateiname = htmlentities ( $dateiname );
    $dateiname = str_replace ("&", "und", $dateiname );
    $dateiname = str_replace ("+", "und", $dateiname );
    $dateiname = str_replace ("(", "-", $dateiname );
    $dateiname = str_replace (")", "-", $dateiname );
    $dateiname = str_replace (" ", "-", $dateiname );
    $dateiname = str_replace ("\'", "-", $dateiname );
    $dateiname = str_replace ("/", "-", $dateiname );
    $dateiname = str_replace ("?", "-", $dateiname );
    $dateiname = str_replace ("!", "-", $dateiname );
    $dateiname = str_replace (":", "-", $dateiname );
    $dateiname = str_replace (";", "-", $dateiname );
    $dateiname = str_replace (",", "-", $dateiname );
    $dateiname = str_replace ("--", "-", $dateiname );
 
    // und nun jagen wir noch die Heilfunktion darüber
    $dateiname = filter_var($dateiname, FILTER_SANITIZE_URL);
    return ($dateiname);
}
?>



