<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
       "http://www.w3.org/TR/html4/strict.dtd">
	   <meta charset="UTF-8">
<html>
 <head>

				<?php
				
				if (isset($_GET["admin"])) {
				 $adminpw = $_GET["admin"];
				 } else {
				 header("Location: passwort.php");
				 }
				
				
			  $fileToInclude = "homeadmin.inc.php";
			  
					$nav4 = "home";
					$nav1 = "dumynav-1";
					$nav2 = "dumynav-2";
					$nav3 = "dumynav-3";
					
			  if (isset($_GET["inhalt"])) {
				$inhalt = $_GET["inhalt"];

				$inhalt = str_replace("http://", "", $inhalt);
				$inhalt = str_replace("www", "", $inhalt);

				if (strlen($inhalt) != 0)  {
				
				  if ($inhalt == "slider") 
				  	$fileToInclude = "slider.inc.php";
				  if ($inhalt == "homeaendern") 
					$fileToInclude = "homeaendern.inc.php";
				  if ($inhalt == "kontakt") 
					$fileToInclude = "kontakt.inc.php";  
				  if ($inhalt == "produkte") 
					$fileToInclude = "produkte.inc.php";  
				  if ($inhalt == "gaestebuch") 
					$fileToInclude = "gaestebuch.inc.html"; 
					if ($inhalt == "gaestebucheintrag") 
					$fileToInclude = "gaestebucheintrag.inc.php";  					
				}
			  } 
			?>

		<link rel="stylesheet" href="flexslider.css"/> 
		<link rel="stylesheet" href="style.css" media="screen and (min-width: 1000px"/> 
		<link rel="stylesheet" href="mobilestyle.css" media="screen and (max-width: 1000px"/>
	
		



		<!--
<link rel="stylesheet" href="mobilestyle.css"/> 
		-->
    </head>

<body id="start">

<div id="wrapper">

<div id="wrapperoben">
	<h1>Käserei Ebersecken</h1>
	<div id="logo">
	<img src="images/logo.png" />
	</div>
	



		
	<div id="metainformation">
			
	<img id="menue" src="Menü.png" />
	<img id="menue2" src="Menü.png" />
	
	
	<nav>
	<ul id="navigation">
		<li><a id="<?php echo($nav1); ?> "href="index.php?inhalt=home&admin=<?php echo($adminpw); ?>">Home</a></li>
		<li><a id="<?php echo($nav3); ?> "href="index.php?inhalt=produkte&admin=<?php echo($adminpw); ?>">Produkte</a></li>
		<li><a id="<?php echo($nav4); ?> "href="index.php?inhalt=home&admin=<?php echo($adminpw); ?>">Kontakt</a></li>
		<li><a id="<?php echo($nav5); ?> "href="admin.php?inhalt=home&admin=<?php echo($adminpw); ?>">Admin</a></li>
	</ul>
	</nav>

	</div>
	
	</div>

	
	
	</div>

	<div id="wrapperunten">


	

	
<?php include($fileToInclude); ?>  

		<script type="text/javascript" src="Javascript.js"></script>
		<script type="text/javascript" src="scrollpos.js"></script>

		
	
<div id="siteinformation"></div>
</body>
	</div>
	</div>
</html>