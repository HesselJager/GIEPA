<?php
	session_start();
	include 'functions.php';
	parse_xml_dir("weatherdata");
	$_SESSION["measurements"]=$measurements;
	
?>