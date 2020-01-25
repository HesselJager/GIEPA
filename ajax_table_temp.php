<?php
	include 'functions.php';
	session_start();
	
	$stationdata=$_SESSION["measurements"][intval($_GET["station"])];
	//output the latest dataset of the full data
	$output = "<table id='temp_table' border='1px'><thead><th>Date and Time</th><th>Temperature</th></thead>";
	for($measurementIndex = 0; $measurementIndex < sizeof($stationdata); $measurementIndex++){
		$temp = $stationdata[$measurementIndex]->temp;
		$time = $stationdata[$measurementIndex]->date_and_time;
		$time = $time->format('d/m/Y H:i:s');
		$output .= "<tr><td>" . $time . "</td>";
		$output .= "<td>" . $temp . "</td></tr>";
	}
	$output .= "</table>";
	echo $output;
?>