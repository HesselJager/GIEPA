<?php
  include 'functions.php';

  /*This code checks if the user is logged in*/
  session_start();
  check_login();
?>
<!--Initiate webpage-->
<!DOCTYPE html>
<html>
<!--Head of webpage-->
<head>
  <link rel="icon" href="giepa.png">
  <!--Opening code for bootstrap-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!--Title of webpage-->
	<title>Weather Information</title>
  <!--Bootstrap makeup for the website-->
	<style>
  	html,
    /*set style for body*/
    body {
      height: 100%;
      background-color: #f5f5f5;
      margin: 0;
      overflow-y: hidden;
    }
    /*set style for content divider*/
    #content{
    	min-height: 80%;
		/*border: 5px;
		border-style: solid;
		border-color: #184893;*/
    }
    /*set style for navigation bar*/
    .navbar {
      min-height: 10%;
    }
    /*set style for navigation bar*/
    .navbar-brand {
      padding: 0 15px;
      height: 10%;
      line-height: 80px;
    }
	/*set style for tekst blok*/
    #tekstBlokMetHelp{ 
      width: 80%;
      padding: 0px;
      margin: 0px;
      border: 0px;
	  margin: auto;
	  padding-top: 2%;
    }
    /*set style for header*/
    header{
      height: 150px;  
      background-color: #DC292A;
      width: 100%;
      padding: 0px;
      margin: 0px;
      border: 0px;
    }
    /*set style for footer*/
    footer {
      height: 10%;
      width: 100%;
      background-color: #184893;
      padding: 0px;
      margin: 0px;
      margin-bottom:0px;
      border: 0px;
    }
    /*set style for buttons*/
    button {
      background-color: #f5f5f5;
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
      box-shadow: 0 10px 16px 0 rgba(0,0,0,0.24);
      height: 100%;
      width:100%;
    }
    /*set style for media*/
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
</head>

<!--Website body-->
<body>
  <!--The navigation bar on the top of the webpage-->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #DC292A; ">
    <!--GIEPA logo-->
    <a class="navbar-brand" href="#">
      <img src="https://www.giepa.gm/sites/default/files/logo-giepa.png" width="180" height="60" alt="" style="background-color:#f5f5f5; padding: 2px; border: 2px solid  #184893; ">
    </a>
    <!--Links to homepage, stations and logout-->
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" style="font-size: 20px;">
        <a class="nav-item nav-link" href="home.php" style="color: #fff;">Home</a>
        <a class="nav-item nav-link" href="maps.php" style="color: #fff;">Stations</a>
		<a class="nav-item nav-link" href="help.php" style="color: #fff;">Help</a>
        <a class="nav-item nav-link" href="logout.php" style="color: #fff;">Log out</a>
      </div>
    </div>
  </nav>
  
  <!--content divider-->
  <div id="content">
	<div id="tekstBlokMetHelp">
	<h1 style="color:#184893">Help</h1>
	Hello and welcome to the webpage of GIEPA's Weather Application. On this webpage you'll be able to see information about both temperture and wind in and surrounding The Gambia. <br>
	In the "Home" tab you will find a general overview of the information about the wind and temperature. The "Stations" tab is for more region specific information regarding the weather. <br>
	In the "Stations" tab you will see a map with multiple red markers and one blue marker. The red markers represent weather stations and the blue marker your current position. Clicking one of these red markers will give you
	information about the the temperature and wind speed and wind direction given by the weather station. You can choose between viewing the information in a graph or in a table. 
	The table can be downloaded by pressing the "Download table" button.
	
	</div>
  </div>
  <!--footer-->
  <footer></footer>
  <!--Closing scripts for bootstrap-->
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