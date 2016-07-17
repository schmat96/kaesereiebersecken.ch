
		<!--
				<img id="fotoslider" src="bilder/panorama04.png" />
		-->
		<meta charset="UTF-8">
		
		<?php
			include("datenbank/datenbankaufruf.php");
				$dbname = "home_text";
				$adminpw = "a62b1fca6b53d6670a84aa2c7b373b27";
		?>
		
	<div class="container">
			<div id="slides">
			
					<?php
					
				$abfrage = mysql_query('SELECT * FROM slider');	
				while($ergebnis = mysql_fetch_array($abfrage))
				{
				  $source = $ergebnis["source"];
				  $woher = $ergebnis["woher"];
				  echo "<img src=bilder/".$source." alt=".$woher.">";
				}
					?>
			</div>
	</div>
	
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <!-- End SlidesJS Required -->

  <!-- SlidesJS Required: Link to jquery.slides.js -->
  <script src="js/jquery.slides.min.js"></script>
  <!-- End SlidesJS Required -->

  <!-- SlidesJS Required: Initialize SlidesJS with a jQuery doc ready -->
  <script>
    $(function() {
      $('#slides').slidesjs({
        width: 1228,
        height: 498,
        play: {
          active: true,
          auto: true,
          interval: 4000,
          swap: true
        }
      });
    });
  </script>
	
		<script type="text/javascript" src="foto.js"></script>
		<div id="hauptinformation">

		
		
<div class="intro">
	<p>
	<?php
				
			$abfrage = mysql_query('SELECT * FROM '.$dbname.' WHERE art=\'1\'');	
			while($ergebnis = mysql_fetch_array($abfrage))
			{
			  $text = $ergebnis["text"];
			  $id = $ergebnis["overview"];
			  echo "$text";
			}
			if (isset($_GET["admin"])) {
				$admin = $_GET["admin"];
				if ($admin == $adminpw) {
				echo(' <a href=homeaendern.php?id='.$id.'&db='.$dbname.'&adminpw='.$adminpw.'>editieren</a>');
				} else {
				echo('<a href=passwort.php>PW ist nicht korrekt!</a>');
				}
			}
	?>
	</p>
	</div>
	
	

	<div class="intro">
		
		<?php
		$abfrage = mysql_query('SELECT * FROM '.$dbname.' WHERE art=\'2\'');
		$anzahl = mysql_num_rows($abfrage);
			for ($i = 0; $i < $anzahl; $i++)
			{
				$text = mysql_result($abfrage, $i, 'text');
				$header = mysql_result($abfrage, $i, 'header');
				$spezial = mysql_result($abfrage, $i, 'spezial');
				$overview = mysql_result($abfrage, $i, 'overview');
				
				echo "<h3>$header</h3><p>$text</p><br />$spezial<br />";
				
				if (isset($_GET["admin"])) {
					$admin = $_GET["admin"];
					if ($admin == $adminpw) {
					echo(' <a href=homeaendern.php?id='.$overview.'&db='.$dbname.'&adminpw='.$adminpw.'>editieren</a> - <a href=delete_home.php?db='.$dbname.'&id='.$overview.'&adminpw='.$adminpw.'>löschen</a>');
					} else {
				echo('<a href=passwort.php>PW ist nicht korrekt!</a>');
				}
				
			}
				
		}
		
		if (isset($_GET["admin"])) {
					$admin = $_GET["admin"];
					if ($admin == $adminpw) {
					$j = $anzahl+1;
					echo('<br /><h3><a href=add.php/art=2&id='.$j.'&adminpw='.$adminpw.'>Füge neuen Abschnitt hinzu</a></h3>');
					} else {
				echo('</br><h3><a href=passwort.php>PW ist nicht korrekt!</a></h3>');
				}
			}
		?>	
	</div>
	<div class="trenner"><hr/></div>

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