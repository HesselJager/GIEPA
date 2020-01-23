<?php
	include 'functions.php';
	
	//filter the needed stations out of the directory and get the full data of the station
	parse_xml_dir("xml_files");
	$stationdata=$measurements[intval($_GET["station"])];
	//ouput the latest dataset of the full data
	echo "Current wind direction: " . wnddir_to_words($stationdata[sizeof($stationdata)-1]->wnddir);
?>