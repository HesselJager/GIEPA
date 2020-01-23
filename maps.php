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
  <!--The divider for the map -->
  <div id="map"></div>
  <!--Script to get the map on the webpage-->
  <script>
    //initialize variable map
    var map;
    //initialize marker variables
    var markerGeolocation, markerGambia, markerAtlantic, markerSouthAtlantic1,
      markerSouthAtlantic2, markerSouthAtlantic3, markerSouthAtlantic5, markerSouthAtlantic6;
    //initialize infoWindow variables
    var infoWindowGeolocation, infowindowGambia, infowindowAtlantic, infowindowSouthAtlantic1,
      infowindowSouthAtlantic2, infowindowSouthAtlantic3, infowindowSouthAtlantic4,
      infowindowSouthAtlantic5, infowindowSouthAtlantic6;
    //this function initiates the map
    function initMap() {
      //initialize coordinate variables for the weather stations
      var gambia                  = {lat: 13.2,     lng: -16.633};  // 617010
      var atlantic                = {lat: 16.733,   lng: -22.95};   // 85940
      var south_atlantic_ocean_1  = {lat: -7.967,   lng: -14.4};    // 619020
      var south_atlantic_ocean_2  = {lat: -54.267,  lng: -36.5};    // 889030
      var south_atlantic_ocean_3  = {lat: -51.817,  lng: -58.45};   // 888890
      var south_atlantic_ocean_4  = {lat: -51.7,    lng: -57.867};  // 888900
      var south_atlantic_ocean_5  = {lat: -51.683,  lng: -57.767};  // 888910
      var south_atlantic_ocean_6  = {lat: -40.35,   lng: -9.883};   // 689060
      //create a map element
      map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: gambia 
      });
      // Geo-locate current position
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          // Make infoWindow for geo-location
          infoWindowGeolocation = new google.maps.InfoWindow;
          infoWindowGeolocation.setPosition(pos);
          infoWindowGeolocation.setContent('Your current location');
          // Make custom marker for current location
          var markerGeolocation = new google.maps.Marker( {
            position: pos,
            map: map,
            title: 'Your current location',
            icon: {
              url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
            }
          })
          // Add event for mouseclick 
          markerGeolocation.addListener('click', function() {
            infoWindowGeolocation.open(map);
            infowindowGambia.close(map);
            infowindowAtlantic.close(map);
            infowindowSouthAtlantic1.close(map);
            infowindowSouthAtlantic2.close(map);
            infowindowSouthAtlantic3.close(map);
            infowindowSouthAtlantic4.close(map);
            infowindowSouthAtlantic5.close(map);
            infowindowSouthAtlantic6.close(map);
          })
          // Error handling
        }, function() {
          handleLocationError(true, infoWindowGeolocation, map.getCenter());
        });
      } else {
        // Browser doesn't support Geo-location
        handleLocationError(false, infoWindowGeolocation, map.getCenter());
      }

      /* Weather Station Gambia */
      // Create content string for station
      var contentStringGambia = '<div id="content">'+
          '<h5>BANJUL/YUNDUM</h5>' +
          '<a class="btn btn-primary" href="view_station.php?station=617010" role="button">Select this station</a>' +
          '</div>';
      // Create infoWindow for station
      infowindowGambia = new google.maps.InfoWindow( {
        content: contentStringGambia});
      // Create marker for station
      markerGambia = new google.maps.Marker( {
        position: gambia,
        map: map,
        url: 'view_station.php?station=617010',
        title: 'Gambia Weather Station'});
      /* Add click event for station marker, opening
       * the infoWindow and closing all other open infoWindows
       */
      markerGambia.addListener('click', function() {
        infowindowGambia.open(map, markerGambia);
        infowindowAtlantic.close(map);
        infowindowSouthAtlantic1.close(map);
        infowindowSouthAtlantic2.close(map);
        infowindowSouthAtlantic3.close(map);
        infowindowSouthAtlantic4.close(map);
        infowindowSouthAtlantic5.close(map);
        infowindowSouthAtlantic6.close(map);
        infoWindowGeolocation.close(map);
      });
      markerGambia.addListener('dblclick', function() {
        window.location.href = this.url;
      });
      /* Weather Station Atlantic Ocean */
      // Create content string for station
      var contentStringAtlantic = '<div id="content">'+
          '<h5>SAL</h5>' +
          '<a class="btn btn-primary" href="view_station.php?station=85940" role="button">Select this station</a>' +
          '</div>';
      // Create infoWindow for station
      infowindowAtlantic = new google.maps.InfoWindow( {
        content: contentStringAtlantic});
      // Create marker for station
      markerAtlantic = new google.maps.Marker( {
        position: atlantic,
        map: map,
        url: 'view_station.php?station=85940',
        title: 'Atlantic Weather Station'});
      /* Add click event for station marker, opening
       * the infoWindow and closing all other open infoWindows
       */
      markerAtlantic.addListener('click', function() {
        infowindowGambia.close(map);
        infowindowAtlantic.open(map, markerAtlantic);
        infowindowSouthAtlantic1.close(map);
        infowindowSouthAtlantic2.close(map);
        infowindowSouthAtlantic3.close(map);
        infowindowSouthAtlantic4.close(map);
        infowindowSouthAtlantic5.close(map);
        infowindowSouthAtlantic6.close(map);
        infoWindowGeolocation.close(map);
      });
      markerAtlantic.addListener('dblclick', function() {
        window.location.href = this.url;
      });
      /* Weather Station south atlantic ocean 1 */
      // Create content string for station
      var contentStringSouthAtlantic1 = '<div id="content">'+
          '<h5>WIDE AWAKE FIELD</h5>' +
          '<a class="btn btn-primary" href="view_station.php?station=619020" role="button">Select this station</a>' +
          '</div>';
      // Create infoWindow for station
      infowindowSouthAtlantic1 = new google.maps.InfoWindow({
        content: contentStringSouthAtlantic1});
      // Create marker for station
      markerSouthAtlantic1 = new google.maps.Marker( {
        position: south_atlantic_ocean_1,
        map: map,
        url: 'view_station.php?station=619020',
        title: 'South Atlantic Weather Station 1'});
      /* Add click event for station marker, opening
       * the infoWindow and closing all other open infoWindows
       */
      markerSouthAtlantic1.addListener('click', function() {
        infowindowGambia.close(map);
        infowindowAtlantic.close(map);
        infowindowSouthAtlantic1.open(map, markerSouthAtlantic1);
        infowindowSouthAtlantic2.close(map);
        infowindowSouthAtlantic3.close(map);
        infowindowSouthAtlantic4.close(map);
        infowindowSouthAtlantic5.close(map);
        infowindowSouthAtlantic6.close(map);
        infoWindowGeolocation.close(map);
      });
      markerSouthAtlantic1.addListener('dblclick', function() {
        window.location.href = this.url;
      });
      /* Weather Station south atlantic ocean 2 */
      // Create content string for station
      var contentStringSouthAtlantic2 = '<div id="content">'+
          '<h5>GRYTVIKEN S.GEORGIA</h5>' +
          '<a class="btn btn-primary" href="view_station.php?station=889030" role="button">Select this station</a>' +
          '</div>';
      // Create infoWindow for station
      infowindowSouthAtlantic2 = new google.maps.InfoWindow( {
        content: contentStringSouthAtlantic2});
      // Create marker for station
      markerSouthAtlantic2 = new google.maps.Marker( {
        position: south_atlantic_ocean_2,
        map: map,
        url: 'view_station.php?station=889030',
        title: 'South Atlantic Weather Station 2'});
      /* Add click event for station marker, opening
       * the infoWindow and closing all other open infoWindows
       */
      markerSouthAtlantic2.addListener('click', function() {
        infowindowGambia.close(map);
        infowindowAtlantic.close(map);
        infowindowSouthAtlantic1.close(map);
        infowindowSouthAtlantic2.open(map, markerSouthAtlantic2);
        infowindowSouthAtlantic3.close(map);
        infowindowSouthAtlantic4.close(map);
        infowindowSouthAtlantic5.close(map);
        infowindowSouthAtlantic6.close(map);
        infoWindowGeolocation.close(map);
      });
      markerSouthAtlantic2.addListener('dblclick', function() {
        window.location.href = this.url;
      });
      /* Weather Station south atlantic ocean 3 */
      // Create content string for station
      var contentStringSouthAtlantic3 = '<div id="content">'+
          '<h5>MOUNT PLEASANT AIRP</h5>' +
          '<a class="btn btn-primary" href="view_station.php?station=888890" role="button">Select this station</a>' +
          '</div>';
      // Create infoWindow for station
      infowindowSouthAtlantic3 = new google.maps.InfoWindow( {
        content: contentStringSouthAtlantic3});
      // Create marker for station
      markerSouthAtlantic3 = new google.maps.Marker( {
        position: south_atlantic_ocean_3,
        map: map,
        url: 'view_station.php?station=888890',
        title: 'South Atlantic Weather Station 3'});
      /* Add click event for station marker, opening
       * the infoWindow and closing all other open infoWindows
       */
      markerSouthAtlantic3.addListener('click', function() {
        infowindowGambia.close(map);
        infowindowAtlantic.close(map);
        infowindowSouthAtlantic1.close(map);
        infowindowSouthAtlantic2.close(map);
        infowindowSouthAtlantic3.open(map, markerSouthAtlantic3);
        infowindowSouthAtlantic4.close(map);
        infowindowSouthAtlantic5.close(map);
        infowindowSouthAtlantic6.close(map);
        infoWindowGeolocation.close(map);
      });
      markerSouthAtlantic3.addListener('dblclick', function() {
        window.location.href = this.url;
      });
      /* Weather Station south atlantic ocean 4 */
      // Create content string for station
      var contentStringSouthAtlantic4 = '<div id="content">'+
          '<h5>STANLEY</h5>' +
          '<a class="btn btn-primary" href="view_station.php?station=888900" role="button">Select this station</a>' +
          '</div>';
      // Create infoWindow for station
      infowindowSouthAtlantic4 = new google.maps.InfoWindow( {
        content: contentStringSouthAtlantic4});
      // Create marker for station
      markerSouthAtlantic4 = new google.maps.Marker( {
        position: south_atlantic_ocean_4,
        map: map,
        url: 'view_station.php?station=888900',
        title: 'South Atlantic Weather Station 4'});
      /* Add click event for station marker, opening
       * the infoWindow and closing all other open infoWindows
       */
      markerSouthAtlantic4.addListener('click', function() {
        infowindowGambia.close(map);
        infowindowAtlantic.close(map);
        infowindowSouthAtlantic1.close(map);
        infowindowSouthAtlantic2.close(map);
        infowindowSouthAtlantic3.close(map);
        infowindowSouthAtlantic4.open(map, markerSouthAtlantic4);
        infowindowSouthAtlantic5.close(map);
        infowindowSouthAtlantic6.close(map);
        infoWindowGeolocation.close(map);
      });
      markerSouthAtlantic4.addListener('dblclick', function() {
        window.location.href = this.url;
      });
      /* Weather Station south atlantic ocean 5 */
      // Create content string for station
      var contentStringSouthAtlantic5 = '<div id="content">'+
          '<h5>STANLEY AIRPORT</h5>' +
          '<a class="btn btn-primary" href="view_station.php?station=888910" role="button">Select this station</a>' +
          '</div>';
      // Create infoWindow for station
      infowindowSouthAtlantic5 = new google.maps.InfoWindow( {
        content: contentStringSouthAtlantic5});
      // Create marker for station
      markerSouthAtlantic5 = new google.maps.Marker( {
        position: south_atlantic_ocean_5,
        map: map,
        url: 'view_station.php?station=888910',
        title: 'South Atlantic Weather Station 5'});
      /* Add click event for station marker, opening
       * the infoWindow and closing all other open infoWindows
       */
      markerSouthAtlantic5.addListener('click', function() {
        infowindowGambia.close(map);
        infowindowAtlantic.close(map);
        infowindowSouthAtlantic1.close(map);
        infowindowSouthAtlantic2.close(map);
        infowindowSouthAtlantic3.close(map);
        infowindowSouthAtlantic4.close(map);
        infowindowSouthAtlantic5.open(map, markerSouthAtlantic5);
        infowindowSouthAtlantic6.close(map);
        infoWindowGeolocation.close(map);
      });
      markerSouthAtlantic5.addListener('dblclick', function() {
        window.location.href = this.url;
      });
      /* Weather Station south atlantic ocean 6 */
      // Create content string for station
      var contentStringSouthAtlantic6 = '<div id="content">'+
        '<h5>GOUGH ISLAND</h5>' +
        '<a class="btn btn-primary" href="view_station.php?station=689060" role="button">Select this station</a>' +
        '</div>';
      // Create infoWindow for station
      infowindowSouthAtlantic6 = new google.maps.InfoWindow( {
        content: contentStringSouthAtlantic6});
      // Create marker for station
      markerSouthAtlantic6 = new google.maps.Marker({
        position: south_atlantic_ocean_6,
        map: map,
        url: 'view_station.php?station=689060',
        title: 'South Atlantic Weather Station 6'});
      /* Add click event for station marker, opening
       * the infoWindow and closing all other open infoWindows
       */
      markerSouthAtlantic6.addListener('click', function() {
        infowindowGambia.close(map);
        infowindowAtlantic.close(map);
        infowindowSouthAtlantic1.close(map);
        infowindowSouthAtlantic2.close(map);
        infowindowSouthAtlantic3.close(map);
        infowindowSouthAtlantic4.close(map);
        infowindowSouthAtlantic5.close(map);
        infowindowSouthAtlantic6.open(map, markerSouthAtlantic6);
        infoWindowGeolocation.close(map);
      });
      markerSouthAtlantic6.addListener('dblclick', function() {
        window.location.href = this.url;
      });
    }

    // This function handles errors for geolocation
    function handleLocationError(browserHasGeolocation, infoWindowGeolocation, pos) {
      infoWindowGeolocation.setPosition(pos);
      infoWindowGeolocation.setContent(browserHasGeolocation ?
         'Error: The Geolocation service failed.' :
         'Error: Your browser doesn\'t support geolocation.');
      infoWindowGeolocation.open(map);
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