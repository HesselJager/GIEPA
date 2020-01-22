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
    /*set style for map*/
    #map {
      height: 80%;  
      width: 100%; 
    }
    /*set style for content divider*/
    #content{
      min-height: 80%;
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
<!--Website body-->
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
        <a class="nav-item nav-link" href="logout.php" style="color: #fff;">Log out</a>
      </div>
    </div>
  </nav>
  <!--The divider for the map -->
  <div id="map"></div>
  <!--Script to get the map on the webpage-->
  <script>
    //this function initiates the map
    function initMap() {
      //set the waypoints for the weather stations
      var gambia                  = {lat: 13.2,     lng: -16.633};  // 617010
      var atlantic                = {lat: 16.733,   lng: -22.95};   // 85940
      var south_atlantic_ocean_1  = {lat: -7.967,   lng: -14.4};    // 619020
      var south_atlantic_ocean_2  = {lat: -54.267,  lng: -36.5};    // 889030
      var south_atlantic_ocean_3  = {lat: -51.817,  lng: -58.45};   // 888890
      var south_atlantic_ocean_4  = {lat: -51.7,    lng: -57.867};  // 888900
      var south_atlantic_ocean_5  = {lat: -51.683,  lng: -57.767};  // 888910
      var south_atlantic_ocean_6  = {lat: -40.35,   lng: -9.883};   // 689060
      //create a map element
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: gambia 
      });
      /* Weather Station Gambia */
      var contentStringGambia = '<div id="content">'+
          '<h5>BANJUL/YUNDUM</h5>' +
          '<a class="btn btn-primary" href="view_station.php?station=617010" role="button">Select this station</a>' +
          '</div>';
      var infowindowGambia = new google.maps.InfoWindow( {
        content: contentStringGambia});
      var markerGambia = new google.maps.Marker( {
        position: gambia,
        map: map,
        title: 'Gambia Weather Station'});
      markerGambia.addListener('click', function() {
        infowindowGambia.open(map, markerGambia);
      });
      /* Weather Station Atlantic Ocean */
      var contentStringAtlantic = '<div id="content">'+
          '<h5>SAL</h5>' +
          '<a class="btn btn-primary" href="view_station.php?station=85940" role="button">Select this station</a>' +
          '</div>';
      var infowindowAtlantic = new google.maps.InfoWindow( {
        content: contentStringAtlantic});
      var markerAtlantic = new google.maps.Marker( {
        position: atlantic,
        map: map,
        title: 'Atlantic Weather Station'});
      markerAtlantic.addListener('click', function() {
        infowindowAtlantic.open(map, markerAtlantic);
      });
      /* Weather Station south atlantic ocean 1 */
      var contentStringSouthAtlantic1 = '<div id="content">'+
          '<h5>WIDE AWAKE FIELD</h5>' +
          '<a class="btn btn-primary" href="view_station.php?station=619020" role="button">Select this station</a>' +
          '</div>';
      var infowindowSouthAtlantic1 = new google.maps.InfoWindow({
        content: contentStringSouthAtlantic1});
      var markerSouthAtlantic1 = new google.maps.Marker( {
        position: south_atlantic_ocean_1,
        map: map,
        title: 'South Atlantic Weather Station 1'});
      markerSouthAtlantic1.addListener('click', function() {
        infowindowSouthAtlantic1.open(map, markerSouthAtlantic1);
      });
      /* Weather Station south atlantic ocean 2 */
      var contentStringSouthAtlantic2 = '<div id="content">'+
          '<h5>GRYTVIKEN S.GEORGIA</h5>' +
          '<a class="btn btn-primary" href="view_station.php?station=889030" role="button">Select this station</a>' +
          '</div>';
      var infowindowSouthAtlantic2 = new google.maps.InfoWindow( {
        content: contentStringSouthAtlantic2});
      var markerSouthAtlantic2 = new google.maps.Marker( {
        position: south_atlantic_ocean_2,
        map: map,
        title: 'South Atlantic Weather Station 2'});
      markerSouthAtlantic2.addListener('click', function() {
        infowindowSouthAtlantic2.open(map, markerSouthAtlantic2);
      });
      /* Weather Station south atlantic ocean 3 */
      var contentStringSouthAtlantic3 = '<div id="content">'+
          '<h5>MOUNT PLEASANT AIRP</h5>' +
          '<a class="btn btn-primary" href="view_station.php?station=888890" role="button">Select this station</a>' +
          '</div>';
      var infowindowSouthAtlantic3 = new google.maps.InfoWindow( {
        content: contentStringSouthAtlantic3});
      var markerSouthAtlantic3 = new google.maps.Marker( {
        position: south_atlantic_ocean_3,
        map: map,
        title: 'South Atlantic Weather Station 3'});
      markerSouthAtlantic3.addListener('click', function() {
        infowindowSouthAtlantic3.open(map, markerSouthAtlantic3);
      });
      /* Weather Station south atlantic ocean 4 */
      var contentStringSouthAtlantic4 = '<div id="content">'+
          '<h5>STANLEY</h5>' +
          '<a class="btn btn-primary" href="view_station.php?station=888900" role="button">Select this station</a>' +
          '</div>';
      var infowindowSouthAtlantic4 = new google.maps.InfoWindow( {
        content: contentStringSouthAtlantic4});
      var markerSouthAtlantic4 = new google.maps.Marker( {
        position: south_atlantic_ocean_4,
        map: map,
        title: 'South Atlantic Weather Station 4'});
      markerSouthAtlantic4.addListener('click', function() {
        infowindowSouthAtlantic4.open(map, markerSouthAtlantic4);
      });
      /* Weather Station south atlantic ocean 5 */
      var contentStringSouthAtlantic5 = '<div id="content">'+
          '<h5>STANLEY AIRPORT</h5>' +
          '<a class="btn btn-primary" href="view_station.php?station=888910" role="button">Select this station</a>' +
          '</div>';
      var infowindowSouthAtlantic5 = new google.maps.InfoWindow( {
        content: contentStringSouthAtlantic5});
      var markerSouthAtlantic5 = new google.maps.Marker( {
        position: south_atlantic_ocean_5,
        map: map,
        title: 'South Atlantic Weather Station 5'});
      markerSouthAtlantic5.addListener('click', function() {
        infowindowSouthAtlantic5.open(map, markerSouthAtlantic5);
      });
      /* Weather Station south atlantic ocean 6 */
      var contentStringSouthAtlantic6 = '<div id="content">'+
        '<h5>GOUGH ISLAND</h5>' +
        '<a class="btn btn-primary" href="view_station.php?station=689060" role="button">Select this station</a>' +
        '</div>';
      var infowindowSouthAtlantic6 = new google.maps.InfoWindow( {
        content: contentStringSouthAtlantic6});
      var markerSouthAtlantic6 = new google.maps.Marker({
        position: south_atlantic_ocean_6,
        map: map,
        title: 'South Atlantic Weather Station 6'});
      markerSouthAtlantic6.addListener('click', function() {
        infowindowSouthAtlantic6.open(map, markerSouthAtlantic6);
      });
    }
  </script>
  <!--Load the API from the specified URL
  * The async attribute allows the browser to render the page while the API loads
  * The key parameter will contain your own API key (which is not needed for this tutorial)
  * The callback parameter executes the initMap() function-->
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDupy91HDLCEYrvsBj32obYqZhbFmg5dPg&callback=initMap">
  </script>
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