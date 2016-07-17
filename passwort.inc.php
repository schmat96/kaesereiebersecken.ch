		<div id="hauptinformationprodukte">
		

	
					<?php
					
					include("datenbank/datenbankaufruf.php");
					$sqlpw = mysql_query("SELECT * FROM passwort");
					$passwort = mysql_result($sqlpw, "0", 'passwort');
					
					
					
				if(isset($_POST['senden']))
				{
					$pw = $_POST['pass'];
					$pw = md5($pw);
					if ($pw == $passwort) {
					header("Location: admin.php?admin=".$pw."&inhalt=home");
					} else {
					echo "pw nicht korrekt!" ;
					}
				}
				?>
				<h2>Login-Formular</h2>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				  <label for="pass">Passwort:</label> <input type="password" id="pass" name="pass" />
				  <input type="submit" name="senden" value="einloggen" />
				</form>  
	
	
	
	</div>