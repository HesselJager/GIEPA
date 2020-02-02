<?php
	include 'functions.php';
	parse_bin("weatherdata/85940.bin","85940");
	print_r($measurements);
?>