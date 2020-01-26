<?php
	include 'functions.php';
	session_start();
	
	$stationdata=$_SESSION["measurements"];
	//output the latest dataset of the full data
	$output = "<table id='temp_table' border='1px'><thead><th>Date and Time</th><th>Temperature</th></thead>";
	$output .= '<tbody onscroll="pauseTable()">';
	$row = "";
	for($measurementIndex = 0; $measurementIndex < sizeof($stationdata); $measurementIndex++){
		$temp = $stationdata[$measurementIndex]->temp;
		$time = $stationdata[$measurementIndex]->date_and_time;
		$time = $time->format('d/m/Y H:i:s');
		$row = "<tr><td>" . $time . "</td><td>" . $temp . "&#8451;</td></tr>" . $row;
	}
	$output .= $row . "</tbody></table>";
	echo $output;
?>