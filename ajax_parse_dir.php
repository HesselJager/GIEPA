<?php
	session_start();
	include 'functions.php';
	$station_id=$_GET['station'];
	parse_xml("weatherdata/$station_id.xml"); 
	$_SESSION["measurements"]=$measurements;
	
	
?>