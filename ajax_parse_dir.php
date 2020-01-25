<?php
	session_start();
	include 'functions.php';
	parse_xml_dir("xml_files");
	$_SESSION["measurements"]=$measurements;
	
?>