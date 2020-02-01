<?php
	include 'functions.php';

	/*This code checks if the user is logged in*/
	session_start();
	check_login();
	$station_id=617010;

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
  <link rel="icon" href="giepa.png">
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
	
	
    /*set style for canvas*/
	canvas{
	  -moz-user-select: none;
	  -webkit-user-select: none;
	  -ms-user-select: none;
    height: 80%;
	}
    /*set style for content divider*/
    #content{
		width:100%;
    	min-height: 24%;
		padding-left: 2%;
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
    #tekstBlokMetWelkom{ 
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
      height: 70px;
      width: 100%;
      background-color: #184893;
      padding: 0px;
      margin: 0px;
      margin-bottom:0px;
      border: 0px;
    }
    /*set style for media*/
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
	  
    }
	table{
    width: 30%;
	border-spacing: 0;
	border-collapse:collapse;
	text-align: center;
	}
	
	tbody, thead tr { display: block; }
	
	tbody {
    height: 200px;
    overflow-y: auto;
    overflow-x: hidden;
	}

	th{
    border:0px solid black;
	width: 10%;
	}
	tr{
    border:1px solid black;
	}
	td{
    width: 10%;
    border:1px solid black;
	}
	/*Made to center fish*/
	.center {
	display: block;
	margin-left: auto;
	margin-right: auto;
	width: 30%;
	}

  </style>
</head>
<!--Webpage body-->
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
	 <div style="position:relative; left:20%; color:#184893; background-color:white; padding: 2px; border: 2px solid  #184893;">
		<?php 
  		echo "<h2 style='text-align: right;'>" . get_station_name($station_id) . "</h2>";
		?>
	</div>
    </div>
  </nav>
  <div id="content">
	<div id="tekstBlokMetWelkom">
	<h1 style="color:#184893">Welcome!</h1>
	Welcome to the webpage of GIEPA's Weather Application. This webpage will give you information about the weather in The Gambia and the surrounding seas. 
	With the information that this website provides you will be able to see the best spot to fish at this current time. 
	</div>
	<img src="https://willemwever.kro-ncrv.nl/sites/default/files/styles/article_header/public/field/image/Fishing_boat_in_the_Canary_Islands.jpeg?itok=_MMAFfFn" width="360" height="250" alt="" style="background-color:#DC292A; padding: 2px; border: 2px solid  #DC292A; width="360" height="250" alt="" style="background-color:#DC292A; padding: 2px; border: 2px solid  #DC292A; " class="center">
  </div>
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
  <script>
  var pause_status = false;
  //Interval for showtemp function
  window.setInterval(checkTable, 1000);
  function checkTable(){
	  if(pause_status == false){
		ReadCSV();
		showTable();
		showtempTable();
		showWdsp(); 
		removeData(window.myLine);
		showWnddir();
	  }
	  else{
		ReadXML();
		showWdsp(); 
		removeData(window.myLine);
		showWnddir();
	  }
  }
  function pauseTable(){
	  pause_status = true;
  }
  function continueTable(){
	  pause_status = false;
  }
  </script>
  <div id="content">
  	

  	<div id="current_temperature"></div>
  	<div id="current_wind_direction" style="color:#184893; font-weight: bold;width:25%;">Current wind direction: </div>
	
	<br/>
	<br/>
	<div style="display:inline-block; width: 49%;">
	<a id="data_table"  class="wtable"></a>
	</div>

  <script>
  parser = new DOMParser();


	var getParam="?station=617010";
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
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) 
          document.getElementById("current_wind_direction").innerHTML = this.responseText;
	    }
	  xmlhttp.open("GET", "ajax_wind_direction.php"+getParam, true);
	  xmlhttp.send();
	}
		    //function to show temperature
	function showTemp() {
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) 
          addData(window.myLine, '', this.responseText);
	    
	  }
	  xmlhttp.open("GET", "ajax_temperature.php"+getParam, true);
	  xmlhttp.send();
	}
    //function to show wind speed
	function showWdsp() {
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) 
	      	var today = new Date();
			var time = today.getHours() + ":" + today.getMinutes();
          	addData(window.myLine, time, this.responseText);
	    
	  }
	  xmlhttp.open("GET", "ajax_wind_speed.php"+getParam, true);
	  xmlhttp.send();
	}
	   //function to show table with weatherdata
	function showTable(){
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) {
			document.getElementById("data_table").innerHTML = this.responseText;
	    }
	  }
	  xmlhttp.open("GET", "ajax_table.php"+getParam, true);
	  xmlhttp.send();
	}
	function showtempTable(){
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) {
			document.getElementById("date_temp_table").innerHTML = this.responseText;
	    }
	  }
	  xmlhttp.open("GET", "ajax_table_temp.php"+getParam, true);
	  xmlhttp.send();
	}
	
	//This function reads the needed csv files once
	function ReadCSV(){
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) {
		
	    }
	  }
	  xmlhttp.open("GET", "ajax_parse_dir.php"+getParam, true);
	  xmlhttp.send();
	}	
	
	
  </script>
  <script src="jquery.min.1.11.1.js" type="text/javascript"></script>  
	<script src="jquery.tabletoxml.js" type="text/javascript"></script>  
  <script type="text/javascript">  
        function exporttoxml(table) {  
            $(table).tabletoxml({  
                rootnode: "Data",  
                childnode: "Measurement",  
                filename: "<?php echo get_station_name($station_id); ?>" + table.substr(1)				
            });  
        }  
	</script>
	</div>
  <footer></footer>
  <!--Closing scripts for bootstrap-->
  <script source="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
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