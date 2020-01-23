<?php
	include 'functions.php';

	/*This code checks if the user is logged in*/
	session_start();
	check_login();

	/*Check which weather station is selected, and if the station is valid*/
	$station_id = $_GET['station'];
	if(check_station($station_id)) {
		$error_message = false;
	} else {
		$error_message = true;
	}
?>
<!--Initiate webpage-->
<!DOCTYPE html>
<html>
<!--Head of webpage-->
<head>
  <!--Opening code for bootstrap-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- script for chart-->
  <script src="https://www.chartjs.org/dist/2.8.0/Chart.min.js"></script>
  <!--Title of the webpage-->
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
    /*set style for canvas*/
	canvas{
	  -moz-user-select: none;
	  -webkit-user-select: none;
	  -ms-user-select: none;
    height: 80%;
	}
    /*set style for content divider*/
    #content{
    	min-height: 24%;
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
<!--Webpage body-->
<body>
  <!--The navigation bar on the top of the webpage-->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #DC292A; ">
    <!--GIEPA logo-->
    <a class="navbar-brand" href="#">
      <img src="https://www.giepa.gm/sites/default/files/logo-giepa.png" width="120" height="40" alt="" style="background-color:#f5f5f5; padding: 2px; border: 2px solid  #184893; ">
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
  <!--container divider-->
  <div class="container">
	<div style="width:75%; float: right; margin-right: -11%;">
	  <!--Canvas here-->
	  <canvas id="canvas" style=""></canvas>
    </div>
    <!--Code that checks if error message needs to be displayed-->
    <?php
	  if($error_message) {
	  echo '<div class="alert alert-danger" role="alert" style="margin-top: 30px;">
  		<b>ERROR: </b>Selected weather station is not available for this application. <a href="home.php" class="alert-link">Go back to the homepage.</a>
		</div>';
	  }
    ?>
  </div>
  <div id="content">
  	<?php 
  		echo "<h2 style='text-align: center;'>" . get_station_name($station_id) . "</h2>";
  	?>

  	<div id="current_temperature"></div>
  	<div id="current_wind_direction"></div>
  </div>
  <script>
  parser = new DOMParser();

	var getParam=window.location.search;
	//set configuration variable
	var config = {
	  //Set graph as linegraph
	  type: 'line',
	  //Graph data information
	  data: {
	    labels: [],
	    datasets: [{
	      label: 'Windspeed in km/h',
	      data: [],
	      fill: false,
	    }]
	  },
	  //Graph options
	  options: {
	  	//responsive options
		responsive: true,
		title: {
		  display: true,
		  text: 'Windspeed in km/h'
		},
		//tooltip options
	    tooltips: {
		  mode: 'index',
		  intersect: false,
		},
		//mouse hover options
	    hover: {
		  mode: 'nearest',
		  intersect: true
		},
		//scaling options
	    scales: {
	      //scaling x-axis
		  xAxes: [{
		    display: true,
			scaleLabel: {
			  display: true,
			  labelString: 'Time'
			}
		  }],
		  //scaling y-axis
		  yAxes: [{
		    scaleLabel: {
			  display: true,
			  labelString: 'Windspeed in km/h',
			}
	      }]
		}
	  }
	};

	//Load data onto graph
	window.onload = function() {
	  var ctx = document.getElementById('canvas').getContext('2d');
	  window.myLine = new Chart(ctx, config);
	};

	//Add data
	function addData(chart, label, data) {
	  chart.data.labels.push(label);
	  chart.data.datasets.forEach((dataset) => {
	    dataset.data.push(data);
	  });
	  chart.update();
	}

	//Remove data
	//After two minutes remove the first value from the data array
	function removeData(chart) {
      if(Object.keys(window.myLine.data.datasets[0].data).length == 120) {
      	chart.data.labels.shift();
	    chart.data.datasets.forEach((dataset) => {
	        dataset.data.shift();
	    });
	    chart.update();
		}
	}

	//function to show wind direction
	function showWnddir(){
	  {
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) 
          addData(window.myLine, '', this.responseText);
	    }
	  }
	  xmlhttp.open("GET", "ajax_wind_direction.php"+getParam, true);
	  xmlhttp.send();
	}
	
    //function to show wind speed
	function showWdsp(){
	  {
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) 
          addData(window.myLine, '', this.responseText);
	    }
	  }
	  xmlhttp.open("GET", "ajax_wind_speed.php"+getParam, true);
	  xmlhttp.send();
	}
	   //function to show table with weatherdata
	function showTable(){
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) 
				xmlDoc = parser.parseFromString(text,this.responseText);
				xmlDoc.getElementsByTagName("MEASUREMENT");
			
			
	    
	  }
	  xmlhttp.open("GET", "ajax_table.php"+getParam, true);
	  xmlhttp.send();
	}
	
	//Interval for showtemp function
	window.setInterval(function() {
	  showWdsp(); 
	  removeData(window.myLine);
	}, 1000);


  </script>
  <!--<footer></footer>-->
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