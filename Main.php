<!DOCTYPE HTML>
<html>
	<head>
		<title>adVenture</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#mapCanvas {
    width: 100%;
    height: 600px;
    float: left;
  }
  #infoPanel {
    float: left;
    margin-left: 10px;
  }
  #infoPanel div {
    margin-bottom: 5px;
  }
  #gmnoprint {
    visibility: hidden;

  }
  
    </style>

	</head>

	<body onload="codeAddress()">

		<!-- Header -->
			<header id="header">
				<nav class="left">
					<a href="index.html"><span>Back</span></a>
				</nav>
				<a href="index.html" class="logo">adVenture</a>
			</header>

<script type="text/javascript"> 

</script>

		<!-- Google Map -->

		      <div id="panel">
      <input id="city_country" type="textbox" value="Berlin, Germany">
      <input type="button" value="Geocode" onclick="codeAddress()">
  </div>  
  <div id="mapCanvas"></div>
  <div id="infoPanel">
    <b>Marker status:</b>
    <div id="markerStatus"><i>Click and drag the marker.</i></div>
    <b>Current position:</b>
      <div id="info"></div>
      <b>Closest matching address:</b>
    <div id="address"></div>
    </div>





    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwLwfdkbXWNpjlDmiH77iTvBI3YbCRkyI&libraries=places&callback=initAutocomplete"
         async defer></script>

			    <form action="/suggestAnswers.php">
					Question: <input type="text"  value="Question"><br>
					<input type="submit" value="Submit">
				</form>


		<!-- Menu -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.html">Home</a></li>
				</ul>
				<ul class="actions vertical">
					<li><a href="#" class="button fit">Login</a></li>
				</ul>
			</nav>

		<!-- Two -->
			<section id="two" class="wrapper style1 special">
				<div class="inner">
					<h2>adVenture</h2>
						<p>adVenture is a website that enables the users to find the right business to be having in that specific area.<br />This system is capable of suggesting and providing the best business for your needs.</p>
				</div>    
			</section>

		<!-- Three -->

			<!-- Footer -->
			<section id="footer">
				<div class="inner">
					<div class="copyright">
						&copy; 2017 <a href="https://templated.co/">adVenture All Rights Reserved</a>
					</div>
				</div>
			</section> 

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
      <script type="text/javascript">
        var geocoder;
var map;
var marker;

codeAddress = function () {
    geocoder = new google.maps.Geocoder();
  
  var address = document.getElementById('city_country').value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 16,
            streetViewControl: false,
          mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
              
    },
    center: results[0].geometry.location,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
      map.setCenter(results[0].geometry.location);
      marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location,
          draggable: true,
          title: 'My Title'
      });
      updateMarkerPosition(results[0].geometry.location);
      geocodePosition(results[0].geometry.location);
        
      // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Dragging...');
  });
      
  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Dragging...');
    updateMarkerPosition(marker.getPosition());
  });
  
  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition());
      map.panTo(marker.getPosition()); 
  });
  
  google.maps.event.addListener(map, 'click', function(e) {
    updateMarkerPosition(e.latLng);
    geocodePosition(marker.getPosition());
    marker.setPosition(e.latLng);
  map.panTo(marker.getPosition()); 
  }); 
  
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}

function updateMarkerStatus(str) {
  document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {
  document.getElementById('info').innerHTML = [
    latLng.lat(),
    latLng.lng()
  ].join(', ');
}

function updateMarkerAddress(str) {
  document.getElementById('address').innerHTML = str;
}

      </script>

	</body>
</html>