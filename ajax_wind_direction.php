<?php
	include 'functions.php';
	session_start();
	
	$stationdata=$_SESSION["measurements"][intval($_GET["station"])];
	//ouput the latest dataset of the full data
	if (array_key_exists(sizeof($stationdata)-1,$stationdata)){
	echo "Current wind direction: " . wnddir_to_words($stationdata[sizeof($stationdata)-1]->wnddir);
	} else{
	 echo "<p style=\"color:red\">No data for this station</p>";
	}
?>