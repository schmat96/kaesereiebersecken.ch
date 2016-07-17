
		<!--
				<img id="fotoslider" src="bilder/panorama04.png" />
		-->
	<div class="container">
			<div id="slides">
			  <img src="bilder/panorama01.jpg" alt="Photo by: Mathias Schmid">
			  <img src="bilder/panorama02.jpg" alt="Photo by: Mathias Schmid">
			  <img src="bilder/panorama03.jpg" alt="Photo by: Mathias Schmid">
			  <img src="bilder/panorama04.jpg" alt="Photo by: Mathias Schmid">
			  <img src="bilder/panorama05.jpg" alt="Photo by: Mathias Schmid">
			  <img src="bilder/panorama06.jpg" alt="Photo by: Mathias Schmid">
			  <img src="bilder/panorama07.jpg" alt="Photo by: Mathias Schmid">
			  <img src="bilder/panorama08.jpg" alt="Photo by: Mathias Schmid">
			  <img src="bilder/panorama09.jpg" alt="Photo by: Mathias Schmid">
			  <img src="bilder/panorama10.jpg" alt="Photo by: Mathias Schmid">
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

		<?php
			include("datenbank/datenbankaufruf.php");
		?>
		
<div class="intro">
	<p>
	<?php
			$abfrage = mysql_query("SELECT * FROM text WHERE overview='1'");	
			//$text = $ergebnis["text"];
			//$anzahl = mysql_num_rows($ergebnis);
			//echo("$text");
			//echo("$anzahl");
			
			while($ergebnis = mysql_fetch_array($abfrage))
			{
			  $text = $ergebnis["text"];
			  echo "$text";
			}
	?>
	</p>
	</div>
	
	

	<div class="intro">
		<h3>Besuchen Sie uns!</h3>
<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.de/maps?f=q&amp;source=s_q&amp;hl=de&amp;geocode=&amp;q=Ebersecken&amp;sll=47.169877,8.018303&amp;sspn=0.208893,0.528374&amp;t=h&amp;g=Ebersecken&amp;ie=UTF8&amp;hq=&amp;hnear=Ebersecken,+Luzern,+Schweiz&amp;ll=47.18299,7.9317&amp;spn=0.208849,0.528374&amp;z=12&amp;output=embed"></iframe><br /><small><a href="https://maps.google.de/maps?f=q&amp;source=embed&amp;hl=de&amp;geocode=&amp;q=Ebersecken&amp;sll=47.169877,8.018303&amp;sspn=0.208893,0.528374&amp;t=h&amp;g=Ebersecken&amp;ie=UTF8&amp;hq=&amp;hnear=Ebersecken,+Luzern,+Schweiz&amp;ll=47.18299,7.9317&amp;spn=0.208849,0.528374&amp;z=12" style="color:#0000FF;text-align:left">Größere Kartenansicht</a></small>	

			<p>Gerne bedienen wir Sie ihn unserem "Chäsiladen" und wünschen Ihnen einen guten!</p>
	</div>
	
			<h3>Information</h3>
<p>Diese Webseite ist momentan noch im Aufbau. Bitte haben Sie Verständniss.</p>
	
	<div class="trenner"><hr/></div>

			</div>
		




	<div id="nebeninformation">
	<ul>
		<li><p></p></li>
	
	<li>
		<p class="angebot"><img src="bilder/angebot.jpg" width="138" height="206" alt="Neu im Angebot: Fondue" class="foto" /><strong>Neu im Angebot</strong>Unser Fondue wird mit viel Liebe und aus den besten Zutaten erstellt.
		</br><a href="index.php?inhalt=produkte" title="Link zu Detailinformationen">Erfahren Sie mehr ...</a></p>
	</li>	
	</ul>
		
	</div>