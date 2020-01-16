<?php

	$USER_USERNAME = "user";
	$USER_PASSWORD = '$argon2i$v=19$m=1024,t=2,p=2$akM3UnRGWWNHNC85bTJLdg$psjf2u6BklW6ZXim+5AEEIPgHoAEBFsreR+ar4mpz6w'; // dikkepoes123!

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