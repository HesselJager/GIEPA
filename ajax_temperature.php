<?php

	include 'functions.php';
	parse_xml_dir("xml_files");
	$stationdata=$measurements[intval($_GET["station"])];
	echo $stationdata[0]->temp;

?>