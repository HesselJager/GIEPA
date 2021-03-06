<?php
	include 'functions.php';
	session_start();

	$stationdata=$_SESSION["measurements"];
	$station_id=$_GET['station'];
	$output = "";
	if(check_wind_station($station_id) == true){
		//output the latest dataset of the full data
		$output .= "<h3>Wind measurements</h3><table id='wind_table' style='width:80%;' border='1px'><thead><th>Date and Time</th><th>   Windspeed</th><th>Winddirection</th></thead>";
		$output .= '<tbody onscroll="pauseTable()">';
		$row = "";
		for($measurementIndex = 0; $measurementIndex < sizeof($stationdata); $measurementIndex++){
			$wndspd = $stationdata[$measurementIndex]->wdsp;
			$wnddir = $stationdata[$measurementIndex]->wnddir;
			$time = $stationdata[$measurementIndex]->date_and_time;
			$time = $time->format('d/m/Y H:i:s');
			$row = "<tr><td>" . $time . "</td><td>" . $wndspd . "&nbsp; km/h</td><td>" . wnddir_to_words($wnddir) . "&nbsp; (" . $wnddir . "&#176;)</td></tr>" . $row;
		}
		$output .= $row . "</tbody></table>";
		$output .= '<p style="width: 80%;"><button onclick="exporttoxml(\'#wind_table\')" style="width: 50%;">Download Table</button><button onclick="continueTable()" style="width: 50%;">Refresh Table</button></p>';
	}
	echo $output;
?>