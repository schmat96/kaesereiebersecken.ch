	<?php
	
		if(isset($_POST['senden']))
	{
	  $adminpw = "a62b1fca6b53d6670a84aa2c7b373b27";
	  $pw = $_POST['pass'];
	  $pw = md5($pw);
	  if ($adminpw == $pw) {
	  header("Location: admin.php?admin=$adminpw");
	  } else {
	  echo "pw ist falsch";
	  }
	}
	?>
	<h2>Login-Formular</h2>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	  <label for="pass">Passwort:</label> <input type="password" id="pass" name="pass" />
	  <input type="submit" name="senden" value="einloggen" />
	</form>   
	


					