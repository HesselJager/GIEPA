<?php

	$USER_USERNAME = "user";

	function verify_login($username, $password) {
		global $USER_USERNAME, $USER_PASSWORD; 
		if(password_verify($password, $USER_PASSWORD) == 1 && $username == $USER_USERNAME) {
			header("location: main.php");
		} 
	}

	function check_login() {
		if(isset($_SESSION['logged_in'])) {
			return true;
		} else {
			return false;
		}
	}


	

?>