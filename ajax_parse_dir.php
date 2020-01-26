<?php
	session_start();
	include 'functions.php';
	parse_xml("weatherdata/$_GET['station'].xml"); 
	$_SESSION["measurements"]=$measurements;
	
?>