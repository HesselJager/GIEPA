<script type="text/javascript">

function showTemp() {{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("temperature").innerHTML = this.responseText;
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
<a href='logout.php'>Log out</a>
<div id="temperature"></div>