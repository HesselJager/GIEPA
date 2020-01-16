<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Weather Information</title>
	    <style>
    	html,

body {
  height: 100%;
  background-color: #f5f5f5;
  width: 99.6%;
  padding: 0.2%;
  margin: 0px;
  border: 0px;
}
#content{
	min-height:90vh;
	
}

header{
height: 150px;	
background-color: #DC292A;
width: 100%;
  padding: 0px;
  margin: 0px;
  border: 0px;
}
footer {
	


 
  height: 150px;
  width: 100%;
	
  background-color: #184893;
  padding: 0px;
  margin: 0px;
  margin-bottom:10px;
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
<header><img src="https://www.giepa.gm/sites/default/files/logo-giepa.png" alt="" style="height: 80%;
background-color:#f5f5f5 ; border:5px solid #0B6461;">
<a href='logout.php' style="position: absolute; right: 2%; top:2%; height:4%;"><button>Log out</button></a>
</header>
<div id="content"></div>
<footer></footer>
</body>

</html>