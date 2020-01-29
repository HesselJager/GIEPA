<?php
	session_start();
	include 'functions.php';
	$station_id=$_GET['station'];
	parse_csv("weatherdata/$station_id.csv"); 
	$_SESSION["measurements"]=$measurements;
	
	
?>