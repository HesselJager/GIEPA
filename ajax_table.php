<?php
	include 'functions.php';
	
	//filter the needed stations out of the directory and get the full data of the station
	parse_xml_dir("xml_files");
	$stationdata=$measurements[intval($_GET["station"])];
	//output the latest dataset of the full data
	$output = "<table id='wind_table' border='1px'><thead><th>Date and Time</th><th>Windspeed</th><th>Winddirection</th></thead>";
	for($measurementIndex = 0; $measurementIndex < sizeof($stationdata); $measurementIndex++){
		$wndspd = $stationdata[$measurementIndex]->wdsp;
		$wnddir = $stationdata[$measurementIndex]->wnddir;
		$time = $stationdata[$measurementIndex]->date_and_time;
		$time = $time->format('d/m/Y H:i:s');
		$output .= "<tr><td>" . $time . "</td>";
		$output .= "<td>" . $wndspd . "</td>";
		$output .= "<td>" . wnddir_to_words($wnddir) . "</td></tr>";
	}
	$output .= "</table>";
	echo $output;
?>