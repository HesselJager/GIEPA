<?php

	include 'functions.php';
	parse_xml_dir("xml_files");
	$stationdata=$measurements[intval($_GET["station"])];
	//todo: sort stationdata array based on $date_and_time attribute of $measurement object, so that the newest is at the tail of the array. (see sort function in functions.php)
	echo $stationdata[sizeof($stationdata)-1]->temp;
	
?>