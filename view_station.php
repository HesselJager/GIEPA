<?php

	include 'functions.php';

	session_start();

	check_login();

	$station_id = $_GET['station'];

	if(check_station($station_id)) {
		$error_message = false;
	} else {
		$error_message = true;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity=sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>Weather Information</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #DC292A; ">

    <a class="navbar-brand" href="#">
      <img src="https://www.giepa.gm/sites/default/files/logo-giepa.png" width="120" height="40" alt="" style="background-color:#f5f5f5; padding: 2px; border: 2px solid  #184893; ">
    </a>
	    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	      <div class="navbar-nav" style="font-size: 20px;">
	        <a class="nav-item nav-link" href="home.php" style="color: #fff;">Home</a>
	        <a class="nav-item nav-link" href="maps.php" style="color: #fff;">Stations</a>
	        <a class="nav-item nav-link" href="logout.php" style="color: #fff;">Log out</a>
	      </div>
	    </div>

  	</nav>
  	<div class="container">
<?php

	if($error_message) {
		echo '<div class="alert alert-danger" role="alert" style="margin-top: 30px;">
  				<b>ERROR: </b>Selected weather station is not available for this application. <a href="home.php" class="alert-link">Go back to the homepage.</a>
				</div>';
	}

?>
	</div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
    crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
    crossorigin="anonymous">
  </script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
    crossorigin="anonymous">
  </script>
</body>
</html>