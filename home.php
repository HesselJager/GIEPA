<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Weather Information</title>
	    <style>
    	html,

body {
  height: 100%;
  background-color: #f5f5f5;
  margin: 0;
}
#content{
	min-height: calc(75% - 20px);
	
}

header{
height: 150px;	
background-color: #DC292A;
width: 100%;
  padding: 0px;
  margin: 0px;
  border: 0px;
}

.navbar {
  min-height: 10%;
}

.navbar-brand {
  padding: 0 15px;
  height: 10%;
  line-height: 80px;
}

footer {
	


 
  height: 15%;
  width: 100%;
	
  background-color: #184893;
  padding: 0px;
  margin: 0px;
  margin-bottom:0px;
  border: 0px;
}
button{
	  background-color: #f5f5f5;
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  box-shadow: 0 10px 16px 0 rgba(0,0,0,0.24);
  height: 100%;
  width:100%;
	
}


      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<script type="text/javascript">

function showTemp() {{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("content").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", "ajax_temperature.php", true);
    xmlhttp.send();
    }
}

window.setInterval(function(){
  	showTemp()
}, 1000);
</script>
<?php

	include 'functions.php';

	session_start();

	check_login();


?>
<body>
<!--<header><img src="https://www.giepa.gm/sites/default/files/logo-giepa.png" alt="" style="height: 80%;
background-color:#f5f5f5 ; border:5px solid #0B6461;">
<a href='logout.php' style="position: absolute; right: 2%; top:2%; height:4%;"><button>Log out</button></a>
</header>

<nav class="navbar navbar-light" style="background-color: #DC292A;">--->
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

<div id="content"></div>
<footer></footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>