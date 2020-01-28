<?php
	include 'functions.php';
	session_start();
	
	$stationdata=$_SESSION["measurements"];
	//ouput the latest dataset of the full data
	if (array_key_exists(sizeof($stationdata)-1,$stationdata)){
		$degrees=$stationdata[sizeof($stationdata)-1]->wnddir;
	createCompass($degrees); 
	echo "Current wind direction: ".wnddir_to_words($degrees) . "&nbsp; (" . $degrees . "&#176;)";
	echo "<img  id=\"compass\"  style=\"width:100%;\"src=\"compass.png\"/>";
	} else{
	 echo "<p style=\"color:red\">No data for this station</p>";
	}
	
?>