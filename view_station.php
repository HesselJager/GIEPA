<?php

	include 'functions.php';

	session_start();

	check_login();

	$station_id = $_GET['station'];

	$allowed_stations = array(617010, 85940, 619020, 889030, 888890, 888900, 888910, 689060);
	
	if(in_array($station_id, $allowed_stations)) {
		echo "allowed weather station";
	} else {
		echo "weather station not allowed";
	}

?>