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
  <link rel="icon" href="./images/giepa.png">
  <!--Opening code for bootstrap-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!--Title of webpage-->
	<title>Help</title>
  <!--Bootstrap makeup for the website-->
	<style>
  	html,
    /*set style for body*/
    body {
      height: 100%;
      background-color: #f5f5f5;
      margin: 0;
    }

    /*Scrollbar*/
  /* width */
  ::-webkit-scrollbar {
    width: 10px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey;
    border-radius: 10px;
  }

  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: #184893;
    border-radius: 10px;
  }
    /*set style for content divider*/
    #content{
    	min-height: 80%;
      padding: 2%;
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
    #textRow{ 
      width: 100%;
      height: 100%;
      margin: 0px;
      border: 0px;
      margin: auto;
      padding-top: 10px;
      position: relative;
    }

    #textColumn {
      float: left;
      width: 40%;
    }

    #imgColumn {
      float: left;
      text-align: center;
      width: 60%;
    }

    #textRow:after {
      content: "";
      display: table;
      clear: both;
    }

    figure {
      padding-left: 30px;
      padding-top: 15px;
    }

    h4 {
      color:#DC292A;
      padding-bottom: 15px;
    }

    figcaption {
      color: #184893;
      font-style: italic;
      font-size: small;
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
    <a class="navbar-brand" href="home.php">
      <img src="./images/logo-giepa.png" width="180" height="60" alt="Logo GIEPA" style="background-color:#f5f5f5; padding: 2px; border: 2px solid  #184893; ">
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
	  <div id="textRow" style="text-align: center;">
    	<h1 style="color:#184893">Help</h1>
    	<p><b>This page is meant to help you out with any questions regarding the use of the GIEPA Weather Application.</b></p>
    </div>
    <div id="textRow">
      <hr />
      <div id="textColumn">
        <h4>Navigation bar</h4>
        <p>
          The red bar on the top of the website is called the <b>navigation bar</b>. By clicking with your left mouse-button, known as <b>Left-clicking</b> going forward, on the text-boxes you can go to the other pages on the website.
        </p>
      </div>
      <div id="imgColumn">
        <figure>
          <img src="./images/navbar2.png" alt="Navigation bar" width="60%" style="border: 4px solid #184893;">
          <figcaption>
            This is the navigation bar, everything outlined in a blue rectangle is clickable.
          </figcaption>
        </figure>
      </div>
    </div>
    <div id="textRow">
      <hr />  
      <div id="textColumn">
      <h4>Homepage</h4>
      <p>
        This page is the first page you visit after logging-in and containts a brief welcome message.It also shows the weather data of the weather station <b>Banjul/Yundum</b>, which is actually the <b>only</b> station located on Gambian soil.
        <br />
        To go back to the homepage, left-click <b>Home</b> on the navigation bar.
      </p>
      </div>
      <div id="imgColumn" style="">
        <figure>
          <a href="home.php"><img src="./images/logo-giepa.png" alt="Logo GIEPA" width="50%" alt="" style="border: 4px solid  #184893;"></a>
          <figcaption>
            You can always left-click on <b>the GIEPA logo</b> on the navigation bar to go straight to the homepage
          </figcaption>
        </figure>
      </div>
    </div>
    <div id="textRow">
      <hr />
      <div id="textColumn">
        <h4>Map of stations</h4>
        <p>
          Left-clicking on <b>Stations</b> sends you to the webpage with a map of the world, which contains a <b>total of 9 markers</b>.
          <hr />
        </p>
        <p style="padding-top: 5px">
          <b>Every red marker</b> represents an individual weather station. Only weather stations in The Gambia area + South Atlantic are marked, for a total of 8 red markers. 
        </p>
          <hr />
        <p style="padding-top: 5px">
          <b>The single blue marker</b> represents the user's current location, also known as your <b>Geolocation</b>.
        </p>
      </div>
      <div id="imgColumn">
        <figure>
          <img src="./images/markers.png" alt="Red and blue marker" width="51%" style="border: 4px solid #DC292A;">
          <figcaption style="padding-right: 12px">
            Left: Weather Station marker &emsp; | &emsp; Right: Geolocation marker.
          </figcaption>
        </figure>
      </div>
    </div>
    <div id="textRow">
      <hr />
      <div id="textColumn">
      <h4>Selecting a station</h4>
      <p>
        Left-clicking a <b>red marker</b> will open up a window on top of the marker that shows the station's name and <b>a button</b> with the text <b>Select this station</b>. Left-click the button to go to that station's measurements.
      </p>
      </div>
      <div id="imgColumn">
        <figure>
          <img src="./images/infowindow.png" alt="infowindow" width="63%" style="border: 4px solid #DC292A;">
          <figcaption>
            Hover your mouse over a weather station marker of your choosing as shown on the left,
            <br />
            then left-click on that marker to get the result as shown on the right.
          </figcaption>
        </figure>
      </div>
    </div>
    <div id="textRow">
      <hr />
      <div id="textColumn">
        <h4>Station information</h4>
        <p>
          <b>The Gambia stations</b> display the local current windspeed <b>in km/h</b> & wind direction, and are updated <b>every second</b>. 
          <br />
          These stations visualise the windspeed <b>via linegraph</b> and the wind-direction <b>via text and compass</b>.
        </p>
        <hr />
        <p style="padding-top: 5px;">
          <b>The South Atlantic stations</b> display the local temperature <b>in °C</b>, and are <b>updated daily</b>.
          <br />
          These stations visualise the temperature <b>via text</b>.
        </p>
      </div>
      <div id="imgColumn">
        <figure>
          <img src="./images/measurements.png" alt="Three measurement visualisations" width="63%" style="border: 4px solid #184893;">
          <figcaption>
            left: wind direction | top-right: windspeed | bottom-right: temperature.
          </figcaption>
        </figure>
      </div>
    </div>
    <div id="textRow">
      <hr />
      <div id="textColumn">
        <h4>Table data</h4>
        <p>
          All stations save their data in <b>a table</b> and is visible on the station webpage. <b>You can download this table</b> in by left-clicking on the <b>Download Table</b> button.
          <hr/>
          The table does <b>not</b> automatically update, but you <b>can refresh the table</b> by left-clickinh the <b>Refresh Table</b> button.
          <hr />
          <b>Note:</b> South Atlantic stations display temperature & the Gambia stations windspeed and direction.
        </p>
      </div>
      <div id="imgColumn">
        <figure>
          <img src="./images/table.png" alt="Data table" width="50%" style="border: 4px solid #184893;">
          <figcaption>
            To download or refresh the table, click the buttons outlined with blue rectangles
            <br />
            Note: South Atlantic stations display temperature & the Gambia stations windspeed and direction
          </figcaption>
        </figure>
      </div>
    </div>
    <div id="textRow">
      <hr />
        <div id="textColumn">
        <h4 style="padding-top: 15px;">Logging out</h4>
        <p>
          Left-clicking on <b>Log out</b> on the navigation bar will send you back to the login screen. You should <b>ALWAYS</b> log out when you are leaving the computer <b>unsupervised</b>, so that unauthorised people cannot access this application.
        </p>
      </div>
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