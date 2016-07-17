<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
       "http://www.w3.org/TR/html4/strict.dtd">
	   <meta charset="UTF-8">
<html>
 <head>

				<?php
			  $fileToInclude = "home.inc.php";
			  if (isset($_GET["inhalt"])) {
				$inhalt = $_GET["inhalt"];

				$inhalt = str_replace("http://", "", $inhalt);
				$inhalt = str_replace("www", "", $inhalt);

				if (strlen($inhalt) != 0)  {
				  if ($inhalt == "home") 
					$fileToInclude = "home.inc.php";
					$nav1 = "home";
					$nav2 = "dumynav-1";
					$nav3 = "dumynav-2";
					$nav4 = "dumynav-3";
				  if ($inhalt == "information") 
					$fileToInclude = "information.inc.html";
					$nav2 = "home";
					$nav1 = "dumynav-1";
					$nav3 = "dumynav-2";
					$nav4 = "dumynav-3";
				  if ($inhalt == "kontakt") 
					$fileToInclude = "kontakt.inc.php";  
					$nav3 = "home";
					$nav1 = "dumynav-1";
					$nav2 = "dumynav-2";
					$nav4 = "dumynav-3";
				  if ($inhalt == "produkte") 
					$fileToInclude = "produkte.inc.php";  
					$nav4 = "home";
					$nav1 = "dumynav-1";
					$nav2 = "dumynav-2";
					$nav3 = "dumynav-3";
				  if ($inhalt == "admin") 
					$fileToInclude = "admin.inc.php"; 
					if ($inhalt == "admin") 
					$fileToInclude = "admin.inc.php";  					
				}
			  }
			  
			  
			  $adminpw = "a62b1fca6b53d6670a84aa2c7b373b27";
			  
			  
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
	<?php
		if (isset($_GET["admin"])) {
			$adminpw = $_GET["admin"];
		echo('<li><a id="'.$nav1.'" \' href="index.php?inhalt=home&admin='.$adminpw.'">Home</a></li>');
		echo('<li><a id="'.$nav1.'" \' href="index.php?inhalt=produkte&admin='.$adminpw.'">Produkte</a></li>');
		echo('<li><a id="'.$nav1.'" \' href="index.php?inhalt=kontakt&admin='.$adminpw.'">Kontakt</a></li>');
		echo('<li><a id="'.$nav1.'" \' href="admin.php?inhalt=admin&admin='.$adminpw.'">Admin</a></li>');
		} else {
		echo('<li><a id="'.$nav1.'" \' href="index.php?inhalt=home">Home</a></li>');
		echo('<li><a id="'.$nav1.'" \' href="index.php?inhalt=produkte">Produkte</a></li>');
		echo('<li><a id="'.$nav1.'" \' href="index.php?inhalt=kontakt">Kontakt</a></li>');
		
		}
	?>
	
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