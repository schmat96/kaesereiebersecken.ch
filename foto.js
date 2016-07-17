bild02();

function bild02(bild) {
	switch (bild) {
		case 1:
			setTimeout('next(1)', 5000);
		break;
		
		case 2:
		    setTimeout('next(2)', 5000);
		break;
		
		case 3:
		    setTimeout('next(3)', 5000);
		break;
		
		case 4:
		    setTimeout('next(4)', 5000);
		break;
		
		case 5:
		    setTimeout('next(5)', 5000);
		break;
		
		case 6:
		    setTimeout('next(6)', 5000);
		break;
		
		case 7:
			setTimeout('next(7)', 5000);
		break;
		
		case 8:
		    setTimeout('next(8)', 5000);
		break;
		
		case 9:
		    setTimeout('next(9)', 5000);
		break;
		
		case 10:
		    setTimeout('next(10)', 5000);
		break;

	   default:
		    setTimeout('next(1)', 5000);
	}
}

function next(bild) {
	switch (bild) {
	 case 1:
		document.getElementById("fotoslider").src="bilder/panorama09.jpg";
		bild02(2);
	break;
	 case 2:
		document.getElementById("fotoslider").src="bilder/panorama02.jpg";
		bild02(3);
	break;
	 case 3:
		document.getElementById("fotoslider").src="bilder/panorama10.jpg";
		bild02(4);
	break;
	case 4:
		document.getElementById("fotoslider").src="bilder/panorama07.jpg";
		bild02(5);
	break;
	case 5:
		document.getElementById("fotoslider").src="bilder/panorama08.jpg";
		bild02(6);
	break;
	case 6:
		document.getElementById("fotoslider").src="bilder/panorama04.jpg";
		bild02(7);
	break;
	case 7:
		document.getElementById("fotoslider").src="bilder/panorama01.jpg";
		bild02(8);
	break;
	case 8:
		document.getElementById("fotoslider").src="bilder/panorama06.jpg";
		bild02(9);
	break;
	case 9:
		document.getElementById("fotoslider").src="bilder/panorama03.jpg";
		bild02(10);
	break;
	case 10:
		document.getElementById("fotoslider").src="bilder/panorama05.jpg";
		bild02(1);
	break;
	default:
		document.getElementById("fotoslider").src="bilder/panorama03.jpg";
		var i = 1;
		bild02(1);
	}
}






