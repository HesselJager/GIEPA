<?php
	include 'functions.php';
	session_start();

	$stationdata=$_SESSION["measurements"];
	//output the latest dataset of the full data
	$output = "<table id='wind_table' border='1px'><thead><th>Date and Time</th><th>   Windspeed</th><th>Winddirection</th></thead>";
	$output .= '<tbody onscroll="pauseTable()">';
	for($measurementIndex = 0; $measurementIndex < sizeof($stationdata); $measurementIndex++){
		$wndspd = $stationdata[$measurementIndex]->wdsp;
		$wnddir = $stationdata[$measurementIndex]->wnddir;
		$time = $stationdata[$measurementIndex]->date_and_time;
		$time = $time->format('d/m/Y H:i:s');
		$output .= "<tr><td>" . $time . "</td>";
		$output .= "<td>" . $wndspd . "&nbsp; km/h</td>";
		$output .= "<td>" . wnddir_to_words($wnddir) . "&nbsp; (" . $wnddir . "&#176;)</td></tr>";
	}
	$output .= "</tbody></table>";
	echo $output;
?>