<?php
	include 'functions.php';
	session_start();
	
	$stationdata=$_SESSION["measurements"][intval($_GET["station"])];
	//ouput the latest dataset of the full data
	echo "Current wind direction: " . wnddir_to_words($stationdata[sizeof($stationdata)-1]->wnddir);
?>